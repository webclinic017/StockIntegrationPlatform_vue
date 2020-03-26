<template>
  <div>

    <multiselect
      v-model="value"
      :options="options"
      :custom-label="nameWithLang"
      placeholder="Select one"
      label="name"
      track-by="name"
      @input="changestockid(value)"
    ></multiselect>
  </div>
</template>

<script>
import Multiselect from "vue-multiselect";

export default {
  components: {
    Multiselect
  },
  data() {
    return {
      value: { name: "股票代碼"},
      options: [
        //   { name: 'Vue.js', language: 'JavaScript' },
      ]
    };
  },

  mounted() {
    this.json_get_local_file();
  },

  methods: {
    //載入stock.json
    json_get_local_file() {
      axios.get("/js/stockid.json", {}).then(response => {
        this.stockids = response.data;
        var s = this.stockids.id;
        // console.log(s);
        const name_ary = [];

        s.forEach(element => {

            var name_object = new Object();
            name_object.name = element;
            name_ary.push(name_object);
        });

        this.options = name_ary;

      });
    },

    changestockid() {
      //捉取畫面股票代碼，帶入basic_info畫面
      let tartget = this.value.name; //tartget：股票代碼
      window.location.assign(`/basic_info/${tartget}`);

      //axios作法，無法跳頁面，需要另要改方法
      //     let tartget = this.value.name
      //   axios
      //     .post("/ajax/checkID",{
      //         id:tartget
      //     })
      //     .then((res)=>{
      //         console.log(res);
      //     })
      //     .catch((res)=>{
      //         console.log(res);
      //     });
    },
  }
};

// export default {
//   // props:[
//   //     "indexSelect"
//   // ],
//   // data:function(){
//   //     return{
//   //     indexSelect:this.indexSelect

//   //     }
//   // },
//   mounted() {
//     console.log("Component mounted.");
//   }
// };
</script>


