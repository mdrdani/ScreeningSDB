function timedRefresh(time) {
    setTimeout(() => {
      location.reload(true);
    }, time)
  }
  (() => {
    timedRefresh(36000);
    setTimeout(() => {
      document.getElementsByTagName("body")[0];
    }, 50)
  })();