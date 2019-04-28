<!--  -->
<link rel="stylesheet" href="https://unpkg.com/element-ui@2.8.2/lib/theme-chalk/index.css">
<!-- <link rel="stylesheet" href="assets/home/css/1.css"> -->
<style>
    .sup-act-title>div {
        white-space: nowrap !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
    }

    .el-pagination.is-background .el-pager li:not(.disabled).active {
        background-color: #44874B;
        color: #FFF;
    }

    .el-pagination.is-background .el-pager li:not(.active):hover {
        color: #44874B;
    }

    .el-pagination.is-background .el-pager li .active:hover {
        color: #fff;
    }

    .el-button--success {
        color: #FFF;
        background-color: #44874B;
        border-color: #44874B;
    }

    .cell>.primary {
        color: #666666;
    }

    .cell>.warning {
        color: #FA6400;
    }

    .cell>.success {
        color: #44874B;
    }

    .cell>.info {
        color: #666666;
    }

    .cell>.detail {
        color: #666666;
        cursor: pointer;
    }

    .cell>.detail:hover {
        color: #44874B;
    }

    .el-table th,
    .el-table tr {
        cursor: unset;
    }

    body {
        margin: 0;
    }
</style>
<!--  -->
<div class="person-my-act" id="app">
    <div class="person-my-act-head">
        <div>
            <p>我的活动赞助</p>
            <small style="margin-left:15px;color: #8C8C8B;" v-html="'('+data.total+')'"></small>
        </div>
    </div>

    <div class="person-my-act-body" style="margin-top:20px;">

        <!-- <div style="width:100%;text-align:center;" v-show="loading">
            <strong style="font-size:48px;color:#e8e8e8;">读取中</strong>
        </div> -->

        <template>
            <!--  -->
            <el-table
             v-loading="loading"              
             lazy 
             ref="filterTable" :data="data.data" style="width: 100%">
                <el-table-column class-name="sup-act-title" prop="activity.title" label="活动名称" sortable width="250">
                </el-table-column>
                <el-table-column prop="activity.active_time" label="活动时间" width="220" sortable>
                </el-table-column>
                <el-table-column prop="activity.status" label="活动状态" width="180" :filters="[{ text: '未开始', value: '10' },{ text: '报名中', value: '20' },{ text: '进行中', value: '30' },{ text: '已结束', value: '40' }]" :filter-method="filterTag" filter-placement="bottom-end">
                    <template slot-scope="scope">
                        <div :class="
                        scope.row.activity.status == 10 ? 'primary' : (
                            scope.row.activity.status == 20 ? 'warning':(
                                scope.row.activity.status == 30 ? 'success':'info'
                            )
                        )
                        ">{{scope.row.activity.status_name}}</div>
                    </template>
                </el-table-column>
                <el-table-column label="操作" prop="activity.id">
                    <template slot-scope="scope">
                        <div :class="'detail'" @click="actDetail(scope.row.activity.id)">查看详情</div>
                    </template>
                </el-table-column>
            </el-table>
            <!--  -->
            <el-pagination style="margin-top:10px;display:flex;justify-content:center;" :page-size="data.per_page" background layout="prev, pager, next,total" :total="data.total" @current-change="changePage">
            </el-pagination>
        </template>
    </div>

</div>


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<!-- import Vue before Element -->
<script src="https://unpkg.com/vue@2.6.10/dist/vue.js"></script>
<!-- import JavaScript -->
<script src="https://unpkg.com/element-ui@2.8.2/lib/index.js"></script>
<script>
    $.get('<?= url('supportAjax') ?>', function(res) {
        //         
        var data = res.data;
        // 
        window.vue = new Vue({
            el: '#app',
            data: {
                key_word: null,
                data: data,
                loading: true
            },
            methods: {
                filterTag: function(value, row) {
                    return row.activity.status == value;
                },
                changePage: function(e) {
                    this.loading = true;
                    var page = e;
                    var _this = this;
                    $.get('<?= url('supportAjax') ?>&page=' + e, function(res) {
                        console.log(res.data);
                        _this.data = res.data;
                        _this.loading = false;
                    });
                },
                actDetail: function(id) {
                    console.log(id);
                    window.location.href = "<?= url('/index/activity') ?>/id/" + id;
                }
            },
            mounted: function() {
                this.loading = false;
            }

        })
    })
</script>