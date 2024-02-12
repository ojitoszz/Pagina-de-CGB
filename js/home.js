document.addEventListener('DOMContentLoaded', function () {
    var botonSubeArchivos = document.getElementById('sube-archivos-btn');
    var miModal = document.getElementById('mi-modal');
    var cerrarModalBtn = document.getElementById('cerrar-modal-btn');

    // Abre el modal al hacer clic en el botón "Sube tus archivos"
    botonSubeArchivos.addEventListener('click', function () {
      miModal.showModal();
    });

    // Cierra el modal al hacer clic en el botón "cerrar"
    cerrarModalBtn.addEventListener('click', function () {
      miModal.close();
    });
  });