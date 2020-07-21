"use strict";
var ctoday=new Date();
var month = ctoday.getUTCMonth() + 1; //months from 1-12
var day = ctoday.getUTCDate();
var year = ctoday.getUTCFullYear();
$('#calendar').fullCalendar({
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
    },
    defaultDate: ctoday,//'2018-07-12',
    editable: true,
    droppable: true, // this allows things to be dropped onto the calendar
    drop: function() {
        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
            // if so, remove the element from the "Draggable Events" list
            $(this).remove();
        }
    },
    eventLimit: true, // allow "more" link when too many events
    events: [
        {
            title: 'All Day Event',
            start: year+'-'+('0' + month).slice(-2)+'-01',
            className: 'bg-info',
            
        },
        {
            title: 'Long Event',
            start: year+'-'+('0' + month).slice(-2)+'-07',
            end: year+'-'+('0' + month).slice(-2)+'-10',
            className: 'bg-danger'
        },
        {
            id: 999,
            title: 'Repeating Event',
            start: year+'-'+('0' + month).slice(-2)+'-09T16:00:00',
            className: 'bg-dark'
        },
        {
            id: 999,
            title: 'Repeating Event',
            start: year+'-'+('0' + month).slice(-2)+'-16T16:00:00',
            className: 'bg-success'
        },
        {
            title: 'Conference',
            start: year+'-'+('0' + month).slice(-2)+'-11',
            end: year+'-'+('0' + month).slice(-2)+'-14',
            className: 'bg-primary'
        },
        {
            title: 'Meeting',
            start: year+'-'+('0' + month).slice(-2)+'-12T10:30:00',
            end: year+'-'+('0' + month).slice(-2)+'-12 T12:30:00',
            className: 'bg-warning'
        },
        {
            title: 'Lunch',
            start: year+'-'+('0' + month).slice(-2)+'-12T12:00:00',
            className: 'bg-dark'
        },
        {
            title: 'Meeting',
            start: year+'-'+('0' + month).slice(-2)+'-12T14:30:00',
            className: 'bg-secondary'
        },
        {
            title: 'Happy Hour',
            start: year+'-'+('0' + month).slice(-2)+'-12T17:30:00',
            className: 'bg-dark'
        },
        {
            title: 'Dinner',
            start: year+'-'+('0' + month).slice(-2)+'-12T20:00:00',
            className: 'bg-warning'
        },
        {
            title: 'Birthday Party',
            start: year+'-'+('0' + month).slice(-2)+'-13T07:00:00',
            className: 'bg-success'
        },
        {
            title: 'Click for Google',
            url: 'http://google.com/',
            start: year+'-'+('0' + month).slice(-2)+'-28',
            className: 'bg-primary'
        }
    ],
    eventClick: function(event) {
        if (event.url) {
            window.open(event.url, "_blank");
            return false;
        }
    }
});