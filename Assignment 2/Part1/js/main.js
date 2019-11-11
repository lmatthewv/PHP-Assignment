function deleteCheck() {
  
  var delCheck = confirm("Are you sure you want to delete?");
  if (delCheck === true) {
    alert('Deleting now');
    return true;
  } else {
    return false;
  }
}