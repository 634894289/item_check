/**
 * Created by luolong on 2017/8/7.
 */
$(function () {

    //更改表单输入框时触发的事件
    $('#user_name').click(function () {
        $('.js-user-name').hide();
    });
    $('#user_password').click(function () {
        $('.js-user-password').hide();
    })

    $('.login-form').click(function () {
        $('.login-error').css('visibility','hidden');
    });

    //输入密码或用户名错误时，显示错误信息
    if ($('.js_check_login').val() !== "-1") {
        $('.login-error').css('visibility','visible');
        // $('.js_check_login').attr('data-message',$('.js_check_login').val());
        $('.js_check_login').val(0);
    }
    else {
        $('.login-error').css('visibility','hidden');
    }

    //点击列表视图时触发的事件
    $('.js-get-table').click(function (e) {
        $('.js-get-table').addClass('active');
        $('.js-get-tree').removeClass('active');
        myFunction.get_table_content();
        myFunction.stopEvent(e);
    });

    //点击树视图时触发的事件
    $('.js-get-tree').click(function (e) {
        $('.js-get-tree').addClass('active');
        $('.js-get-table').removeClass('active');
        myFunction.get_tree_content();
        myFunction.stopEvent(e);
    });

    //登陆成功后执行的操作
    if ($('.js-is-login').val() == 1) {
        myFunction.get_table_content();
        setInterval(function () {
            $(".js-login-time").text(myFunction.set_time());
        },1000);
    }

    //点击注销时触发的事件
    $(".js-exit").click(function (e) {
        myFunction.exit_system();
        myFunction.stopEvent(e);
    });


});

var myFunction = {
    //表单检测
    formCheck: function (form) {
        var flag = true;
        if (form.user_name.value=='') {
            $('.js-user-name').show();
            form.user_name.focus();
            flag = false;
        }
        if (form.user_password.value=='') {
            $('.js-user-password').show();
            form.user_name.focus();
            flag = false;
        }
        return flag;
    },

    //阻止默认行为
    stopEvent: function (e) {
        var e = e || window.event;
        if (e.preventDefault) {
            e.preventDefault();
            e.stopPropagation();
        }
        else {
            e.returnValue = false;
            e.cancelBubble = true;
        }
    },

    //获取列表视图的数据
    get_table_content: function (){
        var $url = 'get_content/get_json_content';
        $.ajax({
            type:"post",
            url:$url,
            data:{'flag': 1},
            dataType:"json",
            success:function(data){
                $('.table-content').html("");
                if (!data.err_message) {
                    if (!$.isEmptyObject(data)) {
                        $(".is-have-content").hide();
                        $(".is-have-error").hide();
                        $('.err_message').val('');
                        var table = $("<table class='table table-bordered table-responsive table-striped'></table>");
                        var thead = $("<thead></thead>");
                        var thead_tr = $("<tr></tr>");
                        for(var i=1; i<8; i++) {
                            var thead_tr_th = $("<th>Column"+i+"</th>")
                            thead_tr.append(thead_tr_th);
                        }
                        thead.append(thead_tr);
                        table.append(thead);
                        // data = JSON.parse(data);
                        var tbody = $("<tbody></tbody>");
                        $.each(data.tableContent, function () {
                            var tbody_tr = $("<tr></tr>");
                            tbody_tr.append("<td>" +this.Column1+ "</td>" + "<td>" +this.Column2+ "</td>" + "<td>" +this.Column3+ "</td>" +
                                    "<td>" +this.Column4+ "</td>" + "<td>" +this.Column5+ "</td>" + "<td>" +this.Column6+ "</td>" +
                                    "<td>" +this.Column7+ "</td>");
                            tbody.append(tbody_tr);
                        });
                        table.append(tbody);
                        $('.table-content').empty().append(table);
                    }
                    else {
                        $(".is-have-content").show();
                    }
                }
                else {
                    $(".is-have-error").show();
                    $('.err_message').text(data.err_message);
                }
            },
            error:function(err){
                console.log(err);
                return false;
            }
        });
    },

    //获取树视图的数据
    get_tree_content: function () {
        $('.table-content').html("");
        var $url = 'get_content/get_json_content';
        $.ajax({
            type:"post",
            url:$url,
            data:{'flag': 0},
            dataType:"json",
            success:function(data){
                if(!data.err_message) {
                    if (!$.isEmptyObject(data)) {
                        $(".is-have-content").hide();
                        $(".is-have-error").hide();
                        $('.err_message').val('');
                        $('.table-content')
                        // .on("changed.jstree", function (e, data) {
                        //     console.log(data.changed.selected); // newly selected
                        //     console.log(data.changed.deselected); // newly deselected
                        //  })
                                .data('jstree', false).empty()
                                .jstree({
                                    'core': {
                                        "animation" : 0,
                                        "themes" : { "dots": false,"icons":false ,"stripes":true},
                                        "check_callback" : true,
                                        "multiple" : false,
                                        'data' : data
                                    },
                                    "state" : { "key" : "demo2" },
                                    // "checkbox" : {
                                    //     "keep_selected_style" : false
                                    // },
                                    // "conditionalselect" : function (node, event) {   //更改选中节点时的样式
                                    //     return false;
                                    // },
                                    "plugins" : ["state"]
                                    // "plugins" : ["changed","contextmenu","conditionalselect","dnd","checkbox","state"]
                                });
                    }
                    else {
                        $(".is-have-content").show();
                    }
                }
                else {
                    $(".is-have-error").show();
                    $('.err_message').val(data.err_message);
                }
            },
            error:function(err){
                console.log(err);
                return false;
            }
        });
    },

    //点击注销时向后台发送删除session数据
    exit_system: function () {
        var $url = "login/exit_system";
        $.ajax({
            type:"post",
            url:$url,
            dataType:"text",
            success:function(data){
                if (data == "success") {
                    location.href = "login";
                    return true;
                }
                else {
                    alert('Failed');
                    return false;
                }
            },
            error:function(err){
                alert('Failed');
                return false;
            }
        });
    },

    //获取当前事件
    set_time: function () {
        function p(s) {
            return s < 10 ? '0' + s: s;
        }

        var myDate = new Date();
        var year=myDate.getFullYear();
        var month=myDate.getMonth()+1;
        var date=myDate.getDate();
        var h=myDate.getHours();
        var m=myDate.getMinutes();
        var s=myDate.getSeconds();
        var now=year+'-'+p(month)+"-"+p(date)+" "+p(h)+':'+p(m)+":"+p(s);
        return now;
    }
}

