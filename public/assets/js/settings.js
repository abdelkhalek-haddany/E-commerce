// check if there is local storage color option

var themeColor = localStorage.getItem('theme_color');
var textColor = localStorage.getItem('text_color');
var darkColor = localStorage.getItem('mode_color');

if(themeColor != null && textColor != null && darkColor != null){
    //set --main-color as a storage color option
    document.documentElement.style.setProperty('--theme-color',themeColor);
    document.documentElement.style.setProperty('--text-color',textColor);
    document.documentElement.style.setProperty('--mode-color',darkColor);
    if(themeColor != "#00000f"){
      document.getElementById("CheckThemeBox").removeAttribute('checked');
    }
}