/**
 * Created by peter on 5/29/2015.
 */
$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever')
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
})
//var tags = new Array();
//$(document).ready(function () {
//    $.get("/cms/tag/all", function (data) {
//        console.log(data.tags);
//        window.tags = data.tags;
//    });
//});


var tagsView = new Vue({
    el: '#tagsView',
    data: {
        message: 'Loading',
        tags: null,
    },
    methods: {
        fetchData: $.get("/cms/tag/all", function (data) {
            tagsView.$data.tags = data.tags;
            console.log(tagsView.$data.tags);
        })

    }
})