const deleteTable = () => {
    const deleteLink = document.querySelector('.table__delete');
    const deleteMsg = document.querySelector('.table__dltMsg');
    const deleteParagraph = document.querySelector('.table__msg');
    const deleteIcon = document.querySelector('.table__xmark');
  
    // State
    let isDeleteMsgOpen = false;
  
    const openDeleteMsg = () => {
      deleteMsg.style.display = 'flex';
      deleteParagraph.style.display = 'inline-flex';
      deleteIcon.style.display = 'block';
      isDeleteMsgOpen = true;
    }
  
    const closeDeleteMsg = () => {
      deleteMsg.style.display = 'none';
      deleteParagraph.style.display = 'none';
      deleteIcon.style.display = 'none';
      isDeleteMsgOpen = false;
    }
  
    deleteLink.addEventListener('click', (event) => {
      event.preventDefault(); // prevent the default behavior of the link
      openDeleteMsg();
    });
  
    deleteIcon.addEventListener('click', () => {
      closeDeleteMsg();
    });
  
    document.addEventListener('click', (event) => {
      if (!deleteMsg.contains(event.target) && event.target !== deleteLink) {
        closeDeleteMsg();
      }
    });
  };