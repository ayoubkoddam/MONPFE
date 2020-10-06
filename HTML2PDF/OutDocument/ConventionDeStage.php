 <?php


     require __DIR__.'/vendor/autoload.php';

 use Spipu\Html2Pdf\Html2Pdf;
    ob_start();
?> 




<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!-- 引入样式 -->
    <link rel="stylesheet" href="style/style.css">

    <style type="text/css" media="print">
        .noprint {
            display: none
        }
        
        .print {
            display: block !important;
        }
    </style>
</head>

<body>
    <div id="app">
        <!-- <header class="el-header noprint"> -->
            <div class="icon-btns">
                <i class="icon-list" @click="changeLeftMenu"></i>
                <i class="icon-skip_previous" v-bind:class="{'disabled': currentPage == 1}" @click="changeCurrentPage('first')"></i>
                <i class="icon-play_arrow prev-icon" v-bind:class="{'disabled': currentPage == 1}" @click="changeCurrentPage('prev')"></i>
                <i class="icon-play_arrow" v-bind:class="{'disabled': currentPage == pageNum}" @click="changeCurrentPage('next')"></i>
                <i class="icon-skip_next" v-bind:class="{'disabled': currentPage == pageNum}" @click="changeCurrentPage('last')"></i>
                <select v-model="currentPage">
                    <option v-for="page in pageNum" v-bind:value="page">page {{ page }}</option>
                </select>
                <i class="icon-zoom_in" v-bind:class="{'disabled': zoomNum == 2}" @click="modifyZoom('in')"></i>
                <select v-model="zoomNum">
                    <option value="0.5">50%</option>
                    <option value="0.6">60%</option>
                    <option value="0.7">70%</option>
                    <option value="0.8">80%</option>
                    <option value="0.9">90%</option>
                    <option value="1.0" selected>100%</option>
                    <option value="1.1">110%</option>
                    <option value="1.2">120%</option>
                    <option value="1.3">130%</option>
                    <option value="1.4">140%</option>
                    <option value="1.5">150%</option>
                    <option value="1.6">160%</option>
                    <option value="1.7">170%</option>
                    <option value="1.8">180%</option>
                    <option value="1.9">190%</option>
                    <option value="2.0">200%</option>
                </select>
                <i class="icon-zoom_out" v-bind:class="{'disabled': zoomNum == 0.5}" @click="modifyZoom('out')"></i>
                <i class="icon-format_align_left" @click="textAlign = 'left'"></i>
                <i class="icon-format_align_center" @click="textAlign = 'center'"></i>
                <i class="icon-format_align_right" @click="textAlign = 'right'"></i>
                <i class="icon-print" @click="window.print()"></i>
            </div>
    

            <div class="tab-conent scrollbar" v-bind:style="{ height: asideHeight + 'px' }">

        
                <ul class="page-menu" v-show="currentNav == 0">
                    <li v-for="page in pageNum" v-bind:class="{ 'curr': currentPage == page }" @click="changePage(page)"><i class="icon-file-text2"></i> page {{ page }}</li>
                </ul>
      

           
                <ul class="page-menu" v-show="currentNav == 0">
                    <li v-for="page in pageNum" v-bind:class="{ 'curr': currentPage == page }" @click="changePage(page)"><i class="icon-turned_in_not"></i> Bookmark {{ page }}</li>
                </ul>
         
        </div>

       
        <div class="main scrollbar noprint"  v-bind:style="{ height: mainHeight + 'px' }" v-bind:class="{ 'mainLeftM': ifMenuShow, 'aleft': textAlign === 'left','acenter': textAlign === 'center','aright': textAlign === 'right'}">
            <div class="conent" v-html="pageContent" v-bind:style="zoomStyle"></div>

            <div class="clear"></div>
        </div>

        
        <div class="conent print" style="display:none" v-html="pageContent"></div>
    </div>
</body>
<
<script src="js/vue.min.js"></script>
<script>

var app = new Vue({
        el: '#app',
        data: function() {
            return {
               
                isCollapse: false,
                currentNav: 0,
                activeName2: 'first',
                pageNum: 1, 
                currentPage: 1,
                pageContent: '',
                asideHeight: 300,
                mainHeight: 300,
                ifMenuShow: true,
                zoomNum: '1.0',
                textAlign: 'left',
                zoomStyle: {},
                pageDatas: ['<div style="position:absolute;top:0.000000px;left:0.000000px"><nobr><img height="1123.000000" width="794.000000" src ="bgimg/bg00001.jpg"/></nobr></div><p><span style="font-family:Calibri;font-size:24.000000px;font-weight:bold;color:#000000;"><span style="position:absolute;top:309.309326px;left:239.672638px"><nobr>Attestation d\'encadrement </nobr></span></span></p><p><span style="font-family:Calibri;font-size:14.000000px;font-style:italic;color:#000000;"><span style="position:absolute;top:415.362701px;left:95.992989px"><nobr>L\'Enseignant …............................................................................................ </nobr></span></span></p><p><span style="font-family:Calibri;font-size:16.000000px;font-style:italic;color:#000000;"><span style="position:absolute;top:450.490662px;left:100.657700px"><nobr>A <span style="font-size:14.000000px;">encadrer les étudiants suivants dans le Projet de Fin d ’Etude, conformément </span></nobr></span><span style="position:absolute;top:478.696014px;left:95.992989px"><nobr><span style="font-size:14.000000px;">au canevas de formation de leur spécialité, en respectant les modalités et les </span></nobr></span><span style="position:absolute;top:503.389313px;left:95.992989px"><nobr><span style="font-size:14.000000px;">délais discutés en réunions des comités pédagogiques et validés par </span></nobr></span></span></p><p><span style="font-family:Calibri;font-size:14.000000px;font-style:italic;color:#000000;"><span style="position:absolute;top:528.055969px;left:95.992989px"><nobr>l ’administration. </nobr></span></span></p><div style="position:absolute;top:563.160034px;left:96.326187px"><nobr><table height="299.106659px" width="609.350769px" bordercolor="black" border="0"><tr><td height = "17.749969" width="112.757637" rowspan="1" colspan="1"><span style="font-family:Calibri;font-size:14.000000px;font-style:italic;color:#000000;"><p><span style="position:absolute;top:0.229289px;left:7.330261px"><nobr>Etudiant 1 </nobr></span></p></span></td><td height = "17.749969" width="112.502701" rowspan="1" colspan="1"><span style="font-family:Calibri;font-size:14.000000px;font-style:italic;color:#000000;"><p><span style="position:absolute;top:0.229289px;left:157.673767px"><nobr>Etudiant 2 </nobr></span></p></span></td><td height = "17.749969" width="113.252441" rowspan="1" colspan="1"><span style="font-family:Calibri;font-size:14.000000px;font-style:italic;color:#000000;"><p><span style="position:absolute;top:0.229289px;left:307.677399px"><nobr>Etudiant 3 </nobr></span></p></span></td><td height = "17.749969" width="118.500275" rowspan="1" colspan="1"><span style="font-family:Calibri;font-size:14.000000px;font-style:italic;color:#000000;"><p><span style="position:absolute;top:0.229289px;left:458.334137px"><nobr>Sujet </nobr></span></p></span></td></tr><tr><td height = "68.780029" width="112.757637" rowspan="1" colspan="1"></td><td height = "68.780029" width="112.502701" rowspan="1" colspan="1"></td><td height = "68.780029" width="113.252441" rowspan="1" colspan="1"></td><td height = "68.780029" width="118.500275" rowspan="1" colspan="1"></td></tr><tr><td height = "69.020020" width="112.757637" rowspan="1" colspan="1"></td><td height = "69.020020" width="112.502701" rowspan="1" colspan="1"></td><td height = "69.020020" width="113.252441" rowspan="1" colspan="1"></td><td height = "69.020020" width="118.500275" rowspan="1" colspan="1"></td></tr><tr><td height = "68.779968" width="112.757637" rowspan="1" colspan="1"></td><td height = "68.779968" width="112.502701" rowspan="1" colspan="1"></td><td height = "68.779968" width="113.252441" rowspan="1" colspan="1"></td><td height = "68.779968" width="118.500275" rowspan="1" colspan="1"></td></tr></table></nobr></div><p><span style="font-family:Calibri;font-size:11.000000px;font-weight:bold;color:#000000;"><span style="position:absolute;top:922.637390px;left:527.351807px"><nobr>Département informatique </nobr></span></span></p><p><span style="font-family:Calibri;font-size:11.000000px;font-style:normal;font-weight:normal;color:#000000;"><span style="position:absolute;top:982.670654px;left:102.656860px"><nobr>Faculté des Sciences – AïnChock Km 8 Route d ’El Jadida B.P 5366 Mâarif Casablanca 20100 </nobr></span></span></p>']
            }
        },
        mounted: function() {
            this.$nextTick(function() {
                this.pageNum = this.pageDatas.length;
                this.pageContent = this.pageDatas[0];

                this.setLeftMenuHeight();
            })
        },
        watch: {
            'currentPage': function(newVal, oldValue) {
                // console.log('newVal ' + newVal, 'oldValue ' + oldValue);
                if (newVal) {
                    this.pageContent = this.pageDatas[this.currentPage - 1];
                }
            },
            'zoomNum': function(newVal, oldValue) {
                if (newVal) {
                    this.zoomStyle = {
                        'transform': 'scale(' + newVal + ')',
                        '-webkit-transform': 'scale(' + newVal + ')',
                        '-ms-transform': 'scale(' + newVal + ')',
                        '-moz-transform': 'scale(' + newVal + ')',
                        '-o-transform': 'scale(' + newVal + ')'
                    }
                }
            }
        },
        methods: {
            
            changeCurrentPage: function(methods) {
                switch (methods) {
                    case 'first':
                        this.currentPage = 1;
                        break;
                    case 'prev':
                        if (this.currentPage > 1) {
                            this.currentPage -= 1;
                        }
                        break;
                    case 'next':
                        if (this.currentPage < this.pageNum) {
                            this.currentPage += 1;
                        }
                        break;
                    case 'last':
                        this.currentPage = this.pageNum;
                        break;
                }
            },

            gotoPage: function(page) {
                console.log(page);
                this.currentPage = page;
            },
            modifyZoom: function(type) {
                switch (type) {
                    case 'in':
                        if (this.zoomNum < 2) {
                            // this.zoomNum = (this.zoomNum + 0.1).toFixed(1);
                            this.zoomNum = (parseFloat(this.zoomNum) + 0.1).toFixed(1);
                        }
                        break;
                    case 'out':
                        if (this.zoomNum > 0.5) {
                            this.zoomNum = (parseFloat(this.zoomNum) - 0.1).toFixed(1);
                        }
                        break;
                    default:
                        break;
                }
                console.log(this.zoomNum);
            },
            setLeftMenuHeight: function() {
                // this.asideHeight = document.body.scrollHeight - 60;
                this.mainHeight = document.documentElement.clientHeight - 60 - 20;
                // 60为头部导航高度， 46为menu高度， 40为上下padding
                this.asideHeight = this.mainHeight - 20 - 46;
            },
            changePage: function(page) {
                this.currentPage = page;
                // this.pageContent = this.pageDatas[page - 1];
            },
            changeLeftMenu: function() {
                this.ifMenuShow = !this.ifMenuShow;
            }
        }
    });

function gotoPage(page) {
    console.log(page);
    app.gotoPage(page);
}

</script>

</html>
    
 <?php
     $content =ob_get_clean();

     $html2pdf = new HTML2PDF('P', 'A4', 'fr');
     $html2pdf->pdf->SetDisplayMode('fullpage');
     $html2pdf->writeHTML($content);
     $html2pdf->Output();
?> 