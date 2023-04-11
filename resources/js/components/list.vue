<template>
    <div>
      <h1>Listado de Productos</h1>
      <ul>
        <li v-for="producto in productos" :key="producto.id">
          {{ producto.nombre }} - {{ producto.referencia }} - {{ producto.precio }}
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  const url = 'http://localhost/laravelvue3/public/productos'
  export default {
    data() {
      return {
        productos: [],
      };
    },
    mounted() {
      // Aquí puedes hacer la llamada a tu controlador para obtener los productos
      // y asignarlos a la propiedad 'productos' en el data del componente
      this.obtenerProductos();
    },
    methods: {
      obtenerProductos() {
        // Hacer la llamada al controlador para obtener los productos
        axios.get(url)
          .then(response => {
            this.productos = response.data;
          })
          .catch(error => {
            console.log('hola');
          });
      },
    },
  };
  </script>
  