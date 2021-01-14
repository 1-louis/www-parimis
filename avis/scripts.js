var ias = jQuery.ias({
    container: '#toutes-les-videos',
    item: '.video',
    pagination: '#pagination',
    next: '.suivant'
});
ias.extension(new IASSpinnerExtension({
    src: 'images/loader.gif'
}));
ias.extension(new IASNoneLeftExtension({
    text: 'Plus aucune vidéo à charger...'
}));
ias.extension(new IASTriggerExtension({
    text: 'Afficher plus de vidéos',
    offset: 5
}));