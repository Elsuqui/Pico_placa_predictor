<template>
  <div>
    <el-container>
      <el-header class="cabecera">
        <div class="titulo">PICO AND PLACA PREDICTOR</div>
      </el-header>
      <el-main class="cuerpo">
        <el-card :body-style="{ 'text-align': '-webkit-center'}">
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
            <label class="step-title">Paso 2: Confirmar si es automóvil o moto</label>
          </el-tag>
          <div style="padding-top: 1%; padding-bottom: 1%;">
            <el-radio-group v-model="tipo_vehiculo" @change="asignarTipoVehiculo">
              <el-radio label="automovil">Automóvil</el-radio>
              <el-radio label="moto">Moto</el-radio>
            </el-radio-group>
          </div>
          <el-tag type="info" size="medium">
            <label class="step-title">Paso 3: Ingresar el número de placa vehicular</label>
          </el-tag>
          <div style="padding-top: 1%; padding-bottom: 1%;">
            <visor-placa
              :value="placa"
              :limite_caracteres="limiteCaracteres"
              @placa="ingresandoPlaca"
            ></visor-placa>
          </div>
          <el-alert
            class="mensaje-alerta"
            center
            size="mini"
            v-show="mostrar_mensaje"
            :title="respuesta_validacion"
            :description="descripcion_validacion"
            :type="tipo_mensaje"
            @close="mostrar_mensaje = false"
            show-icon
          ></el-alert>
          <div style="padding-top: 1%; padding-bottom: 1%;">
            <el-button
              v-if="placa.length > 0"
              type="primary"
              :loading="validandoPlaca"
              @click="verificarCirculacionVehiculo"
            >{{ (validandoPlaca === true) ? 'Verificando....' : 'Verificar placa'}}</el-button>
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
  Alert,
  Radio,
  RadioGroup
} from "element-ui";
import VisorPlaca from "./VisorPlaca";
import lang from "element-ui/lib/locale/lang/es";
import locale from "element-ui/lib/locale";
import service from "../api/servicio";
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
    ElRadio: Radio,
    ElRadioGroup: RadioGroup,
    VisorPlaca
  },
  props: {
    expresion_regular_automovil: { type: RegExp },
    expresion_regular_moto: { type: RegExp }
  },
  data() {
    return {
      fecha_validacion: new Date(),
      validandoPlaca: false,
      respuesta_validacion: "",
      descripcion_validacion: "",
      mostrar_mensaje: false,
      tipo_mensaje: "success",
      placa: "",
      tipo_vehiculo: "automovil"
    };
  },
  mounted() {},
  computed: {
    limiteCaracteres() {
      return this.tipo_vehiculo === "automovil" ? 8 : 6;
    },
    expresion_regular() {
      return this.tipo_vehiculo === "automovil"
        ? this.expresion_regular_automovil
        : this.expresion_regular_moto;
    }
  },
  methods: {
    ingresandoPlaca(placa) {
      this.placa = placa;
    },

    validarPlaca() {
      return this.expresion_regular.test(this.placa);
    },

    mostrarAlerta(tipo, respuesta, descripcion) {
      this.mostrar_mensaje = true;
      this.tipo_mensaje = tipo;
      this.respuesta_validacion = respuesta;
      this.descripcion_validacion = descripcion;
    },

    asignarTipoVehiculo(valor) {
      this.placa = "";
    },

    async verificarCirculacionVehiculo() {
      this.validandoPlaca = true;
      this.mostrar_mensaje = false;
      let valida = this.validarPlaca();
      if (valida) {
        let { data } = await service.verificarPlaca(
          this.fecha_validacion,
          this.placa
        );
        if (data === true) {
          this.mostrarAlerta("success", "Placa autorizada para circular", "");
        } else {
          this.mostrarAlerta(
            "warning",
            "Placa no autorizada para circular",
            ""
          );
        }
      } else {
        if (this.tipo_vehiculo === "automovil") {
          this.mostrarAlerta(
            "error",
            "La placa no tiene un formato válido",
            "El formato es iniciar con 3 letras, seguidas de un '-' y posterior 3 o 4 números. Ej: ABC-1234"
          );
        } else {
          this.mostrarAlerta(
            "error",
            "La placa no tiene un formato válido",
            "El formato es iniciar con 2 letras y posterior 4 números. Ej: AB1234"
          );
        }
      }
      this.validandoPlaca = false;
    }
  }
};
</script>

<style scoped>
@media (max-width: 1920px) {
  .cabecera {
    background-color: #009688;
  }

  .cuerpo {
    align-self: center;
    width: 70%;
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

  .mensaje-alerta {
    width: 30%;
  }
}

@media (max-width: 870px) {
  .cabecera {
    background-color: #009688;
  }

  .cuerpo {
    align-self: center;
    width: 70%;
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

  .mensaje-alerta {
    width: 100%;
  }

  .mensaje-alerta.el-alert__title{
    font-size: 11px !important;
  }
}

@media (max-width: 500px) {
  .cabecera {
    background-color: #009688;
  }

  .cuerpo {
    align-self: center;
    width: 70%;
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

  .mensaje-alerta {
    width: 100%;
  }

  .mensaje-alerta.el-alert__title{
    font-size: 11px !important;
  }
}
</style>