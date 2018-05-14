$('.modal-button').click(function (evt) {
    var action = $(this).data('action');
    var id = $(this).data('id');
    switch(action) {
        case 'edit':
            showModal();
            showEditForm();
            console.log('Edit resource')
            break; 
        case 'stats':
            showModal();
            console.log('Stats of resource')
            break;
        case 'delete':
            showModal();
            console.log('Delete resource')
            break;
    }
})


function showModal(show = true) {
    if (show) {
        $(".modal").addClass("is-active");
    } else {
        $(".modal").removeClass("is-active");
    }
}

$('#modal-ter > div.modal-card > header > button').click(function() {
    showModal(false);
});


function showEditForm() {
    var html = `
    <div class="field">
  <label class="label">Nombre</label>
  <div class="control">
    <input class="input" type="text" placeholder="Nombre" value="${'Unefa'}">
  </div>
</div>

<div class="field">
  <label class="label">Alias</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input is-success" type="text" placeholder="Text input" value="${'Unefa'}">
    <span class="icon is-small is-left">
      <i class="fas fa-user"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </div>
  <p class="help is-success">This username is available</p>
</div>

<div class="field">
  <label class="label">Estado</label>
  <div class="control">
    <div class="select">
      <select>
        <option>-- Seleccione --</option>
        <option>Activo</option>
        <option>Inactivo</option>
      </select>
    </div>
  </div>
</div>
`;
    $('#modal-ter > div.modal-card > section').html(html);
}