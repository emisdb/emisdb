       new Vue({
        el:'#app',
        data:{
            recList: [
                {id: 'name', text : 'Денис'},
                {id: 'phone', text : '+7(812)942-8310'},
                {id: 'mobile', text : '+7(921)942-8310'},
                {id: 'email', text : 'dentsi@yahoo.com'},
            ],
            monthes: [
                {id:1,short:'Янв', full:'Январь', gen:'Января'},
                {id:2,short:'Фев', full:'Февраль', gen:'Февраля'},
                {id:3,short:'Марта', full:'Март', gen:'Марта'},
                {id:4,short:'Апр', full:'Апрель', gen:'Апреля'},
                {id:5,short:'Мая', full:'Май', gen:'Мая'},
                {id:6,short:'Июня', full:'Июнь', gen:'Июня'},
                {id:7,short:'Июля', full:'Июль', gen:'Июля'},
                {id:8,short:'Авг', full:'Август', gen:'Августа'},
                {id:9,short:'Сент', full:'Сентябрь', gen:'Сентября'},
                {id:10,short:'Окт', full:'Октябрь', gen:'Октября'},
                {id:11,short:'Нояб', full:'Ноябрь', gen:'Ноября'},
                {id:12,short:'Дек', full:'Декабрь', gen:'Декабря'},
            ],
            weekdays: ['Пн','Вт','Ср','Чт','Пт','Сб','Вс'],
}
    });



