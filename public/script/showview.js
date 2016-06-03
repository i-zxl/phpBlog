window.onload = function(){
    //获取文章部分的列表
    var entries = document.getElementsByClassName('entries')[0];

    var entry = entries.getElementsByClassName('entry');

    // 给每个列表设置监听entry-imgs下的img
    for (var i = entry.length - 1; i >= 0; i--) {

        listener(entry[i],entry_img,'mouseover');

    }
    //监听事件
    function listener(event,Fun,mouseEvent){

        if (event.addEventListener) {
            //ff
            event.addEventListener(mouseEvent,Fun,false);

        }else if(event.attachEvent){
            //ie9以上的鼠标监听事件
            event.attachEvent('on'+mouseEvent,Fun,false);
        }else{

            event['on'+mouseEvent] = Fun;

            console.log('当前浏览器不支持该操作');
        }
    }    

    function entry_img(){
                
        // 获取event事件对象
        var evt = event || window.event; 
        // 获取目标事件
        var tarEvent =evt.target || avt.srcElement;
        // 判断是不是entry_img
        if (tarEvent.getAttribute('class') === 'entry_img') {
            // 获取父节点的父节点
            var targetPa = tarEvent.parentNode.parentNode;
            // 获取详情的节点
            var details = targetPa.getElementsByClassName('details')[0];
            // 显示详情
            details.style.display = 'block';
            this.onmouseleave = function(){
                details.style.display ='none';
            }
        }

    }
}