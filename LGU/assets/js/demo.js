demo = {
  goNotif: function(message, bold,notif_type,icon){
    $.notify({
        icon: icon,
        message: `${message}<b>${bold}</b>`

      },{
          type: notif_type,
          timer: 2000,
          placement: {
              from: "top",
              align: "center",
          }
      });
    }
}
