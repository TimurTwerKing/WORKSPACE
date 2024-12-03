
interface Persona {
    nombre: string;
    edad: number;
    correo: string;
    activo: boolean;
  }
  
  // Crear un objeto basado en la interfaz
  const usuario: Persona = {
    nombre: "Paquito El Chocolatero",
    edad: 34,
    correo: "pakitoh.morenikoh@pinga.com",
    activo: true,
  };
  
  console.log(usuario);
  