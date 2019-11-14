<template>
  <div class="placa-container">
    <el-row>
      <img class="cabecera-placa" src="img/Imagen_Ant2.png" />
    </el-row>
    <el-row>
      <el-col>
        <el-input
          @input="emitirPlaca"
          type="text"
          :value="placa"
          class="input-placa"
          placeholder="NÚMERO DE PLACA"
        ></el-input>
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
    limite_caracteres: { type: Number },
    value: { type: String }
  },
  data() {
    return {
      placa: ""
    };
  },
  watch:{
    value(){
      this.placa = this.value;
    }
  },
  methods: {
    emitirPlaca(value) {
      if (value.length <= this.limite_caracteres) {
        this.placa = value;
        this.placa = this.placa.toUpperCase();
        this.$emit("placa", this.placa);
      }
    }
  }
};
</script>

<style>
@media (max-width: 1920px) {
  .cabecera-placa {
    /*background-image: url(/img/Imagen_Ant2.png);*/
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
    font-size: 240%;
  }
}

@media (max-width: 1400px) {
  .cabecera-placa {
    /*background-image: url(/img/Imagen_Ant2.png);*/
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
    font-size: 160%;
  }
}

@media (max-width: 870px) {
  .cabecera-placa {
    background-image: url(/img/Imagen_Ant2.png);
    height: 30px;
    background-repeat: no-repeat;
    width: 32%;
  }

  .input-placa {
    width: 32%;
    text-align-last: center;
  }

  .input-placa.el-input .el-input__inner {
    text-align: center;
    height: 100px !important;
    font-size: 80%;
  }
}

@media (max-width: 500px) {
  .cabecera-placa {
    background-image: url(/img/Imagen_Ant2.png);
    height: 30px;
    background-repeat: no-repeat;
    width: 50%;
  }

  .input-placa {
    width: 50%;
    text-align-last: center;
  }

  .input-placa.el-input .el-input__inner {
    text-align: center;
    height: 100px !important;
    font-size: 70%;
  }
}
</style>