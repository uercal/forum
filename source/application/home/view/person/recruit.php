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

    .el-table .cell {
        display: flex;
    }

    .cell>.detail,
    .cell>.del {
        color: #666666;
        cursor: pointer;
        margin-right: .8rem;
    }

    .cell>.detail:hover {
        color: #44874B;
    }

    .cell>.del:hover {
        color: #AE291F;
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
            <p>我的招聘</p>
            <small style="margin-left:15px;color: #8C8C8B;" v-html="'('+data.total+')'"></small>
        </div>

    </div>
    <div style="display:flex;align-items:center;justify-content:space-between;margin-top:20px;">
        <el-input placeholder="请输入内容" v-model="filter.key_word" class="input-with-select" style="width:346px;">
            <el-button slot="append" icon="el-icon-search" @click="handleKeyWord"></el-button>
        </el-input>
        <el-button type="primary" @click="handleAddPaper" icon="el-icon-plus">发布招聘</el-button>
    </div>
    <div class="person-my-act-body" style="margin-top:20px;">
        <template>
            <!--  -->
            <el-table v-loading="loading" lazy ref="filterTable" :data="data.data" style="width: 100%" @filter-change="handleFilter">
                <el-table-column class-name="sup-act-title" prop="str_bonus" label="招聘职位" sortable width="260">
                </el-table-column>
                <el-table-column prop="create_time_date" label="时间" sortable>
                </el-table-column>
                <el-table-column prop="status" label="审核状态" column-key="status" :filters="[{ text: '审核中', value: '10' },{ text: '已发布', value: '20' },{ text: '未通过', value: '30' }]" filter-placement="bottom-end">
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
                <el-table-column label="操作">
                    <template slot-scope="scope">
                        <div :class="'detail'" v-if="scope.row.status==20" @click="actDetail(scope.row.recruit.id)">详情</div>
                        <div :class="'del'" v-if="scope.row.status==20" @click="delDetail(scope.row.id)">删除</div>
                        <div :class="'detail'" v-if="scope.row.status==10" @click="actDetail(0)">/</div>
                        <div :class="'detail'" v-if="scope.row.status==30" @click="actDetail(scope.row.bonus,1)">查看原因</div>
                    </template>
                </el-table-column>
            </el-table>
            <!--  -->
            <el-pagination style="margin-top:10px;display:flex;justify-content:center;" :page-size="data.per_page" background layout="prev, pager, next,total" :total="data.total" @current-change="changePage">
            </el-pagination>
        </template>
    </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->
<script src="assets/home/js/jquery-1.12.4.min.js"></script>
<!-- import Vue before Element -->
<!-- <script src="https://unpkg.com/vue@2.6.10/dist/vue.js"></script> -->
<script src="assets/home/js/vue.js"></script>
<!-- import JavaScript -->
<!-- <script src="https://unpkg.com/element-ui@2.8.2/lib/index.js"></script> -->
<script src="assets/home/js/element.js"></script>
<script>
    //    
    $.get('<?= url('paperAjax') ?>&type=recruit', function(res) {
        //         
        var data = res.data;
        // 
        window.vue = new Vue({
            el: '#app',
            data: {
                data: data,
                loading: true,
                filter: {
                    status: 0,
                    page: 1,
                    key_word: null
                },
            },
            methods: {
                handleKeyWord: function() {
                    this.getList();
                },
                handleAddPaper: function() {
                    window.location.href = '<?= url('recruitUpload') ?>';
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
                    $.post('<?= url('paperAjax') ?>&type=recruit', param, function(res) {
                        _this.data = res.data;
                        _this.loading = false;
                    })
                },
                changePage: function(e) {
                    this.filter.page = e;
                    this.getList();
                },
                actDetail: function(id) {
                    if (isNaN(id)) {
                        this.$alert(id, '驳回理由', {
                            confirmButtonText: '确定'
                        });
                    } else {
                        if (id == 0) {

                        } else {
                            window.recruit(id);
                        }
                    }
                },
                delDetail: function(id) {
                    this.$confirm('此操作将永久删除该文件, 是否继续?', '提示', {
                        confirmButtonText: '确定',
                        cancelButtonText: '取消',
                        type: 'warning'
                    }).then(() => {
                        let _this = this;
                        $.post('<?= url('delPaper') ?>', {
                            id: id,
                            type: 'recruit'
                        }, function(res) {
                            if (res.code == 1) {
                                _this.$message({
                                    type: 'success',
                                    message: '删除成功!',
                                    duration: 1000,
                                    onClose() {
                                        window.location.reload();
                                    }
                                });
                            } else {
                                _this.$message({
                                    type: 'info',
                                    message: '删除错误'
                                });
                            }
                        })
                    }).catch(() => {
                        this.$message({
                            type: 'info',
                            message: '已取消删除'
                        });
                    });
                }
            },
            mounted: function() {
                this.loading = false;
                console.log(this.list_type);
            }

        })
    })
</script>