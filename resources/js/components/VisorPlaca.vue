<template>
  <div class="placa-container">
    <el-row class="cabecera-placa"></el-row>
    <el-row>
      <el-col>
        <el-input @input="emitirPlaca" type="text" v-model="placa" class="input-placa" placeholder="NÚMERO DE PLACA"></el-input>
      </el-col>
    </el-row>
  </div>
</template>

<script>
import { Row, Col, Container, Image, Input } from "element-ui";
export default {
  name: "visor-placa",
  components: {
    ElRow: Row,
    ElCol: Col,
    ElContainer: Container,
    ElImage: Image,
    ElInput: Input
  },
  props: {
    separador: { type: String },
    numero_separaciones: { type: Number },
    expresion_regular: { type: String }
  },
  data() {
    return {
      placa: ""
    };
  },
  methods:{
      emitirPlaca(){
          this.$emit("placa", this.placa);
      }
  }
};
</script>

<style>
.cabecera-placa {
  background-image: url(/img/Imagen_Ant2.png);
  height: 50px;
  background-repeat: no-repeat;
  width: 32%;
}

.input-placa {
  width: 32%;
  text-align-last: center;
}

.input-placa.el-input .el-input__inner {
  text-align: center;
  height: 130px !important;
  font-size: 50px;
}
</style>