function initialize() {
    var newsrc = $('#staticmap').attr('src')
        .replace(/size=\d+x\d+/, 'size=' + $(window).width() + 'x' + ($(window).height()-40))
        .replace(/zoom=\d+/, 'zoom=15') ;
    $('#staticmap').attr('src', newsrc);
}
