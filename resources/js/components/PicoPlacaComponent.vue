<template>
  <div>
    <el-container>
      <el-header class="cabecera">
        <div class="titulo">PICO AND PLACA PREDICTOR</div>
      </el-header>
      <el-main class="cuerpo">
        <el-card :body-style="{ 'text-align': '-webkit-center' }">
          <el-tag type="info" size="medium">
            <label class="step-title">Paso 1: Confirmar la fecha de evaluación</label>
          </el-tag>
          <div style="padding-top: 1%; padding-bottom: 1%;">
            <el-date-picker
              size="mini"
              v-model="fecha_validacion"
              type="datetime"
              placeholder="Seleccionar fecha y hora"
            ></el-date-picker>
          </div>
          <el-tag type="info" size="medium">
            <label class="step-title">Paso 2: Confirmar el número de placa vehicular</label>
          </el-tag>
          <div style="padding-top: 1%; padding-bottom: 1%;">
            <visor-placa @placa="ingresandoPlaca"></visor-placa>
          </div>
          <el-alert class="mensaje-alerta" center v-show="mostrar_mensaje" :title="respuesta_validacion" type="success" show-icon></el-alert>
          <div style="padding-top: 1%; padding-bottom: 1%;">
            <el-button
              type="primary"
              :loading="validandoPlaca"
              @click="validarPlaca"
            >Verificar vehículo</el-button>
          </div>
        </el-card>
      </el-main>
    </el-container>
  </div>
</template>

<script>
import {
  Container,
  Header,
  Main,
  Card,
  Tag,
  DatePicker,
  Button,
  Alert
} from "element-ui";
import VisorPlaca from "./VisorPlaca";
import lang from "element-ui/lib/locale/lang/es";
import locale from "element-ui/lib/locale";
// configure language
locale.use(lang);
export default {
  name: "pico-placa-component",
  components: {
    ElContainer: Container,
    ElHeader: Header,
    ElMain: Main,
    ElCard: Card,
    ElTag: Tag,
    ElDatePicker: DatePicker,
    ElButton: Button,
    ElAlert: Alert,
    VisorPlaca
  },
  props: {},
  data() {
    return {
      fecha_validacion: new Date(),
      validandoPlaca: false,
      respuesta_validacion: "Vehículo permitido para circular",
      mostrar_mensaje: false
    };
  },
  mounted() {},
  computed: {},
  methods: {
    ingresandoPlaca(placa) {
      console.log("Placa: ", placa);
    },

    validarPlaca() {
      this.validandoPlaca = true;
      this.mostrar_mensaje = true;
    }
  }
};
</script>

<style scoped>
.cabecera {
  background-color: #009688;
}

.titulo {
  text-align: center;
  margin-top: 1%;
  font-size: x-large;
  color: white;
}

.step-title {
  font-size: medium;
}

.mensaje-alerta{
  width: 30%;
}
</style>