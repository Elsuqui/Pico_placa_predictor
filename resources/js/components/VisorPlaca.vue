<template>
  <div class="placa-container">
    <el-row>
      <img class="cabecera-placa" src="img/Imagen_Ant2.png" />
    </el-row>
    <el-row>
      <el-col >
        <el-input
          @input="emitirPlaca"
          type="text"
          v-model="placa"
          class="input-placa"
          placeholder="NÚMERO DE PLACA"
        ></el-input>
      </el-col>
    </el-row>
  </div>
</template>

<script>
import { Row, Col, Container, Image, Input,  } from "element-ui";
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
  methods: {
    emitirPlaca() {
      this.$emit("placa", this.placa);
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