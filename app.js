$(function() {
  var editModal = $("#editModal");
  $(".edit").click(function() {
    let editcontent = document.querySelector("#editcontent");
    editcontent.innerHTML =
      "Are you sure you want to edit <strong>" +
      $(this.parentNode).children(":first")[0].innerHTML +
      "</strong>'s details?";
    let actionlink = "edit.php?id=" + $(this.parentNode).attr("id");
    $("#editbutton").attr("href", actionlink);
    editModal.modal({
      show: true
    });
  });

  var deleteModal = $("#deleteModal");
  $(".delete").click(function() {
    let deletecontent = document.querySelector("#deletecontent");

    console.log(deletecontent);
    deletecontent.innerHTML =
      "Are you sure you want to delete <strong>" +
      $(this.parentNode).children(":first")[0].innerHTML +
      "</strong>'s details?";
    let actionlink = "crud.php?delete&id=" + $(this.parentNode).attr("id");
    $("#deletebutton").attr("href", actionlink);
    deleteModal.modal({
      show: true
    });
  });
});
