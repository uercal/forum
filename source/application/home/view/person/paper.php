<!--  -->

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
            <p>我的论文</p>
            <small style="margin-left:15px;color: #8C8C8B;" v-html="'('+data.total+')'"></small>
        </div>

    </div>
    <div style="display:flex;align-items:center;justify-content:space-between;margin-top:20px;">
        <el-input placeholder="请输入内容" v-model="filter.key_word" class="input-with-select" style="width:346px;">
            <el-button slot="append" icon="el-icon-search" @click="handleKeyWord"></el-button>
        </el-input>
        <el-button type="primary" @click="handleAddPaper" icon="el-icon-plus">发布论文</el-button>
    </div>
    <div class="person-my-act-body" style="margin-top:20px;">
        <template>
            <!--  -->
            <el-table v-loading="loading" lazy ref="filterTable" :data="data.data" style="width: 100%" @filter-change="handleFilter">
                <el-table-column class-name="sup-act-title" prop="list_detail.title" label="文章标题" sortable width="280">
                </el-table-column>
                <el-table-column prop="list_detail.create_time_date" label="时间" width="100" sortable>
                </el-table-column>
                <el-table-column prop="list_detail.list.name" column-key="list_id" label="论文类型" width="120" :filters="list_type" filter-placement="bottom-end">
                </el-table-column>
                <el-table-column prop="status" label="审核状态" column-key="status" width="180" :filters="[{ text: '审核中', value: '10' },{ text: '已发布', value: '20' },{ text: '未通过', value: '30' }]" filter-placement="bottom-end">
                    <template slot-scope="scope">
                        <div :class="
                        scope.row.status == 10 ? 'primary' : (
                            scope.row.status == 20 ? 'warning':(
                                scope.row.status == 30 ? 'success':'info'
                            )
                        )
                        ">{{scope.row.status_text}}</div>
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
    // 
    var list_type = JSON.parse('<?= json_encode($type_list) ?>');

    $.get('<?= url('paperAjax') ?>', function(res) {
        //         
        var data = res.data;
        // 
        window.vue = new Vue({
            el: '#app',
            data: {                
                data: data,
                loading: true,
                list_type: list_type,
                filter: {
                    list_id: [],
                    status: 0,
                    page: 1,
                    key_word:null
                },
            },
            methods: {
                handleKeyWord:function(){
                    this.getList();
                },
                handleAddPaper:function(){
                    window.location.href = '<?= url('paperUpload') ?>';
                },
                handleFilter: function(filters) {                    
                    for (var i in filters) {
                        this.filter[i] = filters[i];
                    }
                    this.page = 1;
                    this.getList();
                },
                getList: function() {
                    this.loading = true;
                    var param = this.filter;
                    var _this = this;
                    console.log(param);
                    $.post('<?= url('paperAjax') ?>', param, function(res) {
                        _this.data = res.data;
                        _this.loading = false;
                    })
                },
                changePage: function(e) {
                    this.filter.page = e;                    
                    this.getList();                    
                },
                actDetail: function(id) {
                    console.log(id);
                    window.location.href = "<?= url('/index/activity') ?>/id/" + id;
                }
            },
            mounted: function() {
                this.loading = false;
                console.log(this.list_type);
            }

        })
    })
</script>