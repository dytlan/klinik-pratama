<template>
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">Silahkan Pilih Obat</div>

        <div class="card-body">
          <div class="row">
            <div class="col-12 bg-white p-4">
              <div
                class="form-group row d-flex"
                v-for="(medical, k) in data.medicals"
                :key="k"
              >
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Data Obat</label>
                    <select
                      class="form-control"
                      v-model="medical.obat_id"
                      :class="medical.obatIdNull ? 'is-invalid' : ''"
                    >
                      <option
                        v-for="(medicine, k) in data.medicines"
                        :key="k"
                        :value="medicine.id"
                      >
                        {{ medicine.nama }}
                      </option>

                      <option v-if="data.medicines < 1" value="-">-</option>
                    </select>
                  </div>
                </div>

                <div class="col-5">
                  <div class="form-group">
                    <label for="">Quantity</label>
                    <input
                      placeholder="Quantity"
                      type="number"
                      class="form-control text-dark"
                      :class="
                        medical.quantityNull || medical.quantityOver
                          ? 'is-invalid'
                          : ''
                      "
                      name="name"
                      min="1"
                      v-model="medical.quantity"
                    />
                    <div v-show="medical.quantityOver" class="text-danger">
                      Quantity melebihi stok yang tersedia
                    </div>
                  </div>
                </div>

                <div class="col-2 col-md-1 d-flex p-0">
                  <span class="d-flex ml-2" style="margin-top: 40px">
                    <i
                      class="fas fa-trash text-danger icon-remove"
                      @click="remove(k)"
                      v-show="k || (!k && data.medicals.length > 1)"
                    ></i>
                    <i
                      class="fas fa-plus-circle text-success ml-2 icon-add"
                      @click="add(k)"
                      v-show="k == data.medicals.length - 1"
                    ></i>
                  </span>
                </div>
              </div>
              <button
                @click.prevent="submit()"
                class="btn btn-block btn-primary"
              >
                SIMPAN
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["route_redirect_resep", "register_pelayanan_id", "user_id"],
  data() {
    return {
      data: {
        medicines: "",
        medicals: [
          {
            obat_id: "",
            obatIdNull: false,
            quantity: "",
            quantityNull: false,
            quantityOver: false,
          },
        ],
      },
    };
  },

  created() {
    axios
      .get(`obat`)
      .then((response) => {
        this.data.medicines = response.data;
      })
      .catch((err) => alert("gagal menerima data obat"));
  },

  methods: {
    submit() {
      // set error to false
      const refreshData = this.data.medicals.map((val) => {
        return {
          ...val,
          obatIdNull: false,
          quantityNull: false,
          quantityOver: false,
        };
      });
      this.data.medicals = refreshData;

      // set necessary variable
      const route = this.route_redirect_resep;
      const pelayanan_id = this.register_pelayanan_id;
      const userId = this.user_id;

      let errors = 0;
      this.data.medicals.forEach((val, index) => {
        const qty = this.data.medicines.filter((v) => {
          return v.id == val.obat_id;
        });

        if (val.obat_id === "") {
          val.obatIdNull = true;
          errors += 1;
        }
        if (val.quantity === "") {
          val.quantityNull = true;
          errors += 1;
        }
        if (val.quantity > qty[0].jumlah) {
          val.quantityOver = true;
          errors += 1;
        }

        if (errors === 0 && index === this.data.medicals.length - 1) {
          let dataMedicals = this.data.medicals;
          const postData = {
            user_id: userId,
            medicines: dataMedicals,
          };
          axios
            .post(`transaksi/obat/${pelayanan_id}`, postData)
            .then(() => {
              swal.fire({
                position: "top-end",
                icon: "success",
                title: "Permintaan Resep Berhasil Dibuat",
                showConfirmButton: false,
                toast: true,
                timer: 1500,
              });
              setTimeout(function () {
                window.location.href = route;
              }, 1500);
            })
            .catch((err) => console.log(err));
        }
      });
    },

    add(index) {
      this.data.medicals.push({
        obat_id: "",
        obatIdNull: false,
        quantity: "",
        quantityNull: false,
        quantityOver: false,
      });
    },
    remove(index) {
      this.data.medicals.splice(index, 1);
    },
  },
};
</script>

<style scoped>
.icon-remove {
  cursor: pointer;
  font-size: 18px;
}
.icon-add {
  cursor: pointer;
  font-size: 18px;
}
</style>
