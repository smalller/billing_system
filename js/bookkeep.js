//tab导航部分
let tab = document.getElementById("tab");
let tops = tab.getElementsByTagName("li");

//主体表单部分
let show_box = document.getElementById("show-box");
let bots = show_box.getElementsByTagName("li");


//循环给每个li加鼠标移入事件和序号
for (let i = 0; i < tops.length; i++) {
    // 将i号赋给按钮
    tops[i].xuhao = i;
    //当i号按钮点击时
    tops[i].onclick = function(){   
        //获得当前移入的li的序号
        let c = this.xuhao;
        //让所有bots先全部隐藏
        for (let i = 0; i < bots.length; i++) {
            bots[i].style.display = 'none';
            tops[i].className = "none";
        }
        //让c号bots显示（点击谁谁就显示）
        bots[c].style.display = 'block';
        tops[c].className = "show";
    }
}