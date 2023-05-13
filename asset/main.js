// ***************************GESTION DES FAVORIS *********************************


let selected = 'js-is-selected';

$('.favorite').click(function() {
  if( $(this).hasClass(selected)) {
    $(this).removeClass(selected)
  } else {
    $(this).addClass(selected)
  }
})

// ************************FIN GESTION DES FAVORIS ******************************