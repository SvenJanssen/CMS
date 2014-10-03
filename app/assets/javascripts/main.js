$.fn.serializeObject = function(){
    var o = {};
    var a = this.serializeArray();

    $.each(a, function() {
        this.name = this.name.replace(/\[\]$/, '');

        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }

            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });

    return o;
};



$(document).ready(function(){
   
    // 
    $(".tooltip-examples a").tooltip({
        placement : 'bottom'
    });
});