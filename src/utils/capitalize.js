$(document).ready(function() {
  // '#' is used to select elements by their id
  // if you wanted to select an element by its 'name' attribute -> $('input[name="name"]')
  $('#user').on('input', function() {
    var capitalized = $(this).val().replace(/(^|\s)\S/g, function(firstLetter) {
      return firstLetter.toUpperCase();
    });
    $(this).val(capitalized);
  });
});

export default capitalize;

// can delete
// auto capitalize the input in AdminAddUser