jQuery(function($){
    $('.date-picker').daterangepicker({
        "singleDatePicker": true,
        "autoApply": true,
    });

    var HotelCalendar = function(container){
        var self = this;
        this.container = container;
        this.calendar= null;
        this.form_container = null;

        this.init = function(){
            self.container = container;
            self.calendar = $('.calendar-content', self.container);
            self.form_container = $('.calendar-form', self.container);
            setCheckInOut('', '', self.form_container);
            self.initCalendar();
        }

        this.initCalendar = function(){
            self.calendar.fullCalendar({
                firstDay: 1,
                lang:'en',
                //timezone: '',
                customButtons: {
                    reloadButton: {
                        text: 'Refresh',
                        click: function() {
                            self.calendar.fullCalendar( 'refetchEvents' );
                        }
                    }
                },
                header : {
                    left:   'today,reloadButton',
                    center: 'title',
                    right:  'prev, next'
                },
                buttonText:{
                    today: 'Today'
                },
                selectable: true,
                select : function(start, end, jsEvent, view){
                    var today = new Date();
                    if((start.unix() < moment(today).unix())){
                        self.calendar.fullCalendar('unselect');
                        setCheckInOut('', '', self.form_container);
                    }else{
                        var zone = moment(start._d).format('Z');
                        zone = zone.split(':');
                        zone = "" + parseInt(zone[0]) + ":00";
                        var check_in = moment(start._d).utcOffset(zone).format("MM/DD/YYYY");
                        var	check_out = moment(end._d).utcOffset(zone).subtract(1, 'day').format("MM/DD/YYYY");
                        setCheckInOut(check_in, check_out, self.form_container);
                    }
                },
                events:function(start, end, timezone, callback) {
                    $.ajax({
                        url: site_url + 'dashboard/room/getAvailability',
                        dataType: 'json',
                        type:'post',
                        data: {
                            post_id:self.container.data('post-id'),
                            start: start.unix(),
                            end: end.unix()
                        },
                        success: function(doc){
                            if(typeof doc === 'object'){
                                callback(doc);
                            }
                        },
                        error:function(e)
                        {
                            console.log(e);
                        }
                    });
                },
                eventClick: function(event, element, view){
                    setCheckInOut(event.start.format('MM/DD/YYYY'),event.start.format('MM/DD/YYYY'),self.form_container);
                    $('#calendar_price', self.form_container).val(event.price);
                    $('#calendar_status', self.form_container).val(event.status);
                },
                eventRender: function(event, element, view){
                    var html = '';
                    if(event.status == 'available'){
                        var classIsBase = 'is-base';
                        if(!event.is_base){
                            classIsBase = '';
                        }
                        html += '<div class="price available '+ classIsBase +'">Price: '+event.price+'</div>';
                    }
                    if(typeof event.status == 'undefined' || event.status != 'available'){
                        html += '<div class="price unavailable">Unavailable</div>';
                    }
                    $('.fc-content', element).html(html);
                },
                loading: function(isLoading, view){
                    if(isLoading){
                        $('.overlay', self.container).addClass('open');
                    }else{
                        $('.overlay', self.container).removeClass('open');
                    }
                },

            });
        }
    };

    function setCheckInOut(check_in, check_out, form_container){
        $('#calendar_check_in', form_container).val(check_in);
        $('#calendar_check_out', form_container).val(check_out);
    }
    function resetForm(form_container){
        $('#calendar_check_in', form_container).val('');
        $('#calendar_check_out', form_container).val('');
        $('#calendar_price', form_container).val('');
    }
    jQuery(document).ready(function($) {
        $('.calendar-wrapper').each(function(index, el) {
            var t = $(this);
            var hotel = new HotelCalendar(t);

            var flag_submit = false;
            $('#calendar_submit', t).click(function(event) {
                var data = $('input, select', '.calendar-form').serializeArray();

                var dataTemp = [];
                for(var i = 0; i < data.length; i++){
                   if(data[i].name === 'calendar_check_in'){
                       var sdf = moment(new Date(data[i].value)).format('YYYY-MM-DD');
                       dataTemp.push({
                           name: 'calendar_check_in',
                           value: moment(new Date(sdf)).unix()
                       })
                   }else if(data[i].name === 'calendar_check_out'){
                        var sdf = moment(new Date(data[i].value)).format('YYYY-MM-DD');
                        dataTemp.push({
                            name: 'calendar_check_out',
                            value: moment(new Date(sdf)).unix()
                        })
                    }else{
                       dataTemp.push(data[i]);
                   }
                }

                $('.form-message', t).attr('class', 'form-message').find('p').html('');
                $('.overlay', self.container).addClass('open');
                if(flag_submit) return false; flag_submit = true;
                $.post(site_url + 'dashboard/room/addAvailability', dataTemp, function(respon, textStatus, xhr) {
                    if(typeof respon === 'object'){
                        if(respon.status){
                            resetForm(t);
                            $('.calendar-content', t).fullCalendar('refetchEvents');
                        }else{
                            $('.overlay', self.container).removeClass('open');
                        }
                        $('.form-message', t).addClass(respon.type).find('p').html(respon.message);
                    }else{
                        $('.overlay', self.container).removeClass('open');
                    }
                    flag_submit = false;
                }, 'json');
                return false;
            });

            $(document).on('click','#pills-availability-tab',function(){
                if(hotel.calendar == null){
                    hotel.init();
                }else{
                    hotel.calendar.fullCalendar( 'refetchEvents' );
                }
            });


            $('body').on('calendar.change_month', function(event, value){
                var date = hotel.calendar.fullCalendar('getDate');
                var month = date.format('M');
                date = date.add(value-month, 'M');
                hotel.calendar.fullCalendar( 'gotoDate', date.format('YYYY-MM-DD') );
            });
        });
    });
});
