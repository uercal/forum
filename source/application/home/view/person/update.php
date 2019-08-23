<style>
    .avatar-uploader .el-upload {
        border: 1px dashed #d9d9d9;
        border-radius: 6px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .avatar-uploader .el-upload:hover {
        border-color: #409EFF;
    }

    .avatar-uploader-icon {
        font-size: 28px;
        color: #8c939d;
        width: 178px;
        height: 178px;
        line-height: 178px;
        text-align: center;
    }

    .avatar {
        width: 178px;
        height: 178px;
        display: block;
        object-fit: contain;
    }

    /*  */
    .el-tabs--card>.el-tabs__header {
        border-bottom: none;
    }

    .el-tabs--card>.el-tabs__header .el-tabs__nav {
        border: none;
    }

    .el-tabs__item {
        height: 45px;
        padding: 0px 20px;
        background: #D9D9D9;
        color: #fff;
        margin-right: 15px;
        /*  */
        font-family: PingFangSC-Medium;
        font-size: 18px;
        color: #FFFFFF;
        letter-spacing: 0;
    }

    .el-tabs__item.is_active {
        color: #fff;
    }

    .el-tabs__item:hover {
        color: #fff;
        background: rgba(145, 184, 148, 0.5);
    }

    .el-tabs--card>.el-tabs__header .el-tabs__item.is-active {
        background: rgba(145, 184, 148, 1);
        color: #fff;
    }

    .el-form--label-left .el-form-item__label {
        white-space: nowrap;
    }

    /*  */
    .divider {
        display: flex;
        align-items: center;
        margin-bottom: 25px;
        /*  */
        font-family: PingFangSC-Regular;
        font-size: 16px;
        color: #333333;
        letter-spacing: 0;
        font-weight: 600;
    }

    .divider::before {
        content: '';
        width: 6px;
        height: 6px;
        border-radius: 3px;
        background: #44874B;
        margin-right: 6px;
    }

    .line {
        text-align: right;
        float: left;
        font-size: 14px;
        color: #606266;
        line-height: 40px;
        /* padding: 0 12px 0 0; */
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        font-weight: 700;
        white-space: nowrap;
    }

    .el-form-item__content {
        margin-right: 10px;
    }

    label {
        font-weight: 500;
    }

    .row-bg {
        padding: 0px 8px;
    }

    .upload-demo {
        padding: 8px 0px;
    }

    .el-upload__input {
        display: none !important;
    }

    .edui-container {
        width: auto !important;
    }

    /*  */
    .el-tag + .el-tag {
    margin-left: 10px;
    }
    .button-new-tag {
        margin-left: 10px;
        height: 32px;
        line-height: 30px;
        padding-top: 0;
        padding-bottom: 0;
    }
    .input-new-tag {
        width: 90px;
        margin-left: 10px;
        vertical-align: bottom;
    }
</style>
<!--  -->
<div class="person-my-act" id="app">
    <div class="person-my-act-head">
        <div>
            <p>入会/入库类型</p>
            <small style="margin-left:20px;color:#999999;">(请选择相应的类型)</small>
        </div>
    </div>

    <div class="person-my-act-body" style="margin-top:35px;">
        <template>
            <el-tabs v-model="activeName" type="card" class="">
                <?php if ($levelOption == 0 || $levelOption == 1): ?>
                    <el-tab-pane label="<?=$levelOption == 2 ? '修改个人会员+专家信息' : '个人会员+专家'?>" name="person">
                        <el-form ref="person" :model="form_person" :rules="person_rules" label-width="80px" label-position="left" style="margin-top:30px;">
                            <!--  -->
                            <div class="divider">个人基本信息</div>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="姓名：" prop="name">
                                        <el-input v-model="form_person.name" placeholder="请填写姓名 "></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="身份证：" prop="id_card">
                                        <el-input v-model="form_person.id_card" placeholder="请填写身份证号码 "></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="性别：" prop="gender">
                                        <el-radio v-model="form_person.gender" label="0">男</el-radio>
                                        <el-radio v-model="form_person.gender" label="1">女</el-radio>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="邮箱：" prop="email">
                                        <el-input v-model="form_person.email" placeholder="请填写邮箱"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="手机号：" prop="phone">
                                        <el-input v-model="form_person.phone" placeholder="请填写手机号"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="邮编：" prop="post_code">
                                        <el-input v-model="form_person.post_code" placeholder="请填写邮编"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="国籍：" prop="nationality">
                                        <el-input v-model="form_person.nationality" placeholder="请填写国籍"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="政治面貌：" prop="political_face">                                        
                                        <el-select v-model="form_person.political_face" placeholder="请选择" style="width:100%;">
                                            <el-option v-for="item in political_face_options" :key="item" :label="item" :value="item">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="籍贯：" prop="native_place">
                                        <el-input v-model="form_person.native_place" placeholder="请填写籍贯"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="民族：" prop="minzu">
                                        <el-input v-model="form_person.minzu" placeholder="请填写民族"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="住址：" prop="person_address">
                                        <el-input v-model="form_person.person_address" placeholder="请填写住址"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="微信号：" prop="wechat">
                                        <el-input v-model="form_person.wechat" placeholder="请填写微信号"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>

                            <div class="divider">学历教育信息</div>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="毕业院校：" prop="education_school">
                                        <el-input v-model="form_person.education_school" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="学历：" prop="education_degree">
                                        <el-select v-model="form_person.education_degree" placeholder="请选择" style="width:100%;">
                                            <el-option v-for="item in education_degree_options" :key="item" :label="item" :value="item">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="学位：" prop="education_degree_xw">
                                        <el-select v-model="form_person.education_degree_xw" placeholder="请选择" style="width:100%;">
                                            <el-option v-for="item in education_degree_xw_options" :key="item" :label="item" :value="item">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="专业：" prop="education_major">
                                        <el-input v-model="form_person.education_major" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>                                
                            </el-row>
                            <el-row type="flex" class="row-bg">                               
                                <el-col :span="12">
                                    <el-form-item label="毕业时间：" prop="education_time">
                                        <el-date-picker type="date" value-format="yyyy-MM-dd" placeholder="选择日期" v-model="form_person.education_time" style="width: 100%;"></el-date-picker>
                                    </el-form-item>
                                </el-col>
                            </el-row>

                            <div class="divider">工作信息</div>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="24">
                                    <el-form-item label="所在单位：" prop="belong_company">
                                        <el-input v-model="form_person.belong_company" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>                               
                            </el-row>
                            <el-row type="flex" class="row-bg">  
                                <el-col :span="12">
                                    <el-form-item label="职务：" prop="job">
                                        <el-input v-model="form_person.job" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>                              
                                <el-col :span="12">
                                    <el-form-item label="职称等级：" prop="positio">
                                        <el-select v-model="form_person.positio" multiple placeholder="请选择" style="width:100%;">
                                            <el-option v-for="(item,index) in positio_options" :key="index" :label="item" :value="item">
                                            </el-option>
                                        </el-select>                                        
                                    </el-form-item>
                                </el-col>                                
                            </el-row>                            
                            <el-row type="flex" class="row-bg">   
                                <el-col :span="12">
                                    <el-form-item label="业务行业：" prop="sector">
                                        <el-select v-model="form_person.sector" multiple placeholder="请选择" style="width:100%;">
                                            <el-option v-for="(item,index) in sector_options" :key="index" :label="item" :value="item">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-col>                             
                                <el-col :span="12">
                                    <el-form-item label="业务领域：" prop="area">
                                        <el-select v-model="form_person.area" multiple placeholder="请选择" style="width:100%;">
                                            <el-option v-for="(item,index) in area_options" :key="index" :label="item" :value="item">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-col>                                
                            </el-row>
                            <el-row type="flex" class="row-bg">     
                                <el-col :span="12">
                                    <el-form-item label="参加工作时间：" label-width="30%" prop="work_limit">
                                        <el-date-picker type="date" value-format="yyyy-MM-dd" placeholder="选择日期" v-model="form_person.work_limit" style="width: 100%;"></el-date-picker>
                                    </el-form-item>
                                </el-col>                           
                                <el-col :span="12">
                                    <el-form-item label="职称取得时间：" label-width="30%" prop="positio_time">
                                        <el-date-picker type="date" value-format="yyyy-MM-dd" placeholder="选择日期" v-model="form_person.positio_time" style="width: 100%;"></el-date-picker>
                                    </el-form-item>
                                </el-col>                                
                            </el-row>
                            <el-row type="flex" class="row-bg">                                                                
                                <el-col :span="12">
                                    <el-form-item label="高层次人才：" prop="highPeople" label-width="90px">
                                        <el-select v-model="form_person.highPeople" multiple placeholder="请选择" style="width:100%;">
                                            <el-option v-for="(item,index) in highPeopleOptions" :key="index" :label="item" :value="item">
                                            </el-option>
                                        </el-select>                                        
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="24">
                                    <el-form-item label="职业资格：" label-width="80px">
                                        <el-tag
                                        :key="tag"
                                        v-for="tag in form_person.pro_qualify"
                                        closable
                                        :disable-transitions="false"
                                        @close="handleClose(tag)">
                                        {{tag}}
                                        </el-tag>
                                        <el-input
                                            class="input-new-tag"
                                            v-if="inputVisible"
                                            v-model="inputValue"
                                            ref="saveTagInput"
                                            size="small"
                                            @keyup.enter.native="handleInputConfirm"
                                            @blur="handleInputConfirm"
                                        >
                                        </el-input>
                                        <el-button v-else class="button-new-tag" size="small" @click="showInput">添加</el-button>                                                                                                                                                              
                                    </el-form-item>                                    
                                </el-col>                                
                            </el-row>                      
                            <!--  -->
                            <div class="divider" style="margin-top:25px;">等级</div>
                            <el-row>
                                <el-col :span="12" style="position:relative;">
                                    <el-form-item label="会员等级：" prop="memberLevel">
                                        <el-select v-model="form_person.memberLevel" placeholder="请选择" style="width:100%;">
                                            <el-option v-for="item in levelPersonOptions" :key="item" :label="item" :value="item">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12" style="position:relative;">
                                    <el-form-item label="专家等级：" prop="expertLevel">
                                        <el-select v-model="form_person.expertLevel" placeholder="请选择" style="width:100%;">
                                            <el-option v-for="item in expertLevelOptions" :key="item" :label="item" :value="item">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <!--  -->
                            <div class="divider" style="margin-top:25px;">图片信息</div>
                            <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;">
                                <el-col :span="20" style="display:flex;align-items:center;">
                                    <label style="margin:0;">个人证件照：<small style="color:#999999;font-weight:100;font-size:10px;">（推荐上传1寸&2寸的JPG&PNG图片，且不超过2MB）</small>
                                    </label>
                                </el-col>
                            </el-row>

                            <div style="padding:20px 0px;">
                                <el-upload class="avatar-uploader" action="<?=url('uploadFile')?>&param=idcard" ref="idcard" :show-file-list="false" :on-success="handleIdcardSuccess" :before-upload="beforeAvatarUpload">
                                    <img v-if="idPhotoUrl" :src="idPhotoUrl" class="avatar">
                                    <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                                </el-upload>
                            </div>

                            <!-- PDF -->
                            <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;">
                                <el-col :span="20" style="display:flex;align-items:center;">
                                    <label style="margin:0;">个人证件附件：<small style="color:#999999;font-weight:100;font-size:10px;">（学历和学位、职称、职业资格、高层次人才等证书制成一个PDF文件上传，且不超过2MB）</small>
                                    </label>
                                </el-col>
                            </el-row>

                            <div style="padding:20px 0px;">
                                <el-upload class="avatar-uploader" action="<?=url('uploadFile')?>&param=personfile" ref="personFile" accept=".pdf" :show-file-list="false" :on-success="handlePersonFileSuccess" :before-upload="beforeFileUpload">
                                    <img v-if="personFileUrl" :src="personFileUrl" class="avatar">
                                    <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                                </el-upload>
                            </div>

                            <div class="divider" style="margin-top:25px;">个人简介</div>

                            <el-row>
                                <el-col :span="24" style="position:relative;">
                                    <el-form-item label="简介描述" prop="introduce">
                                        <el-input type="textarea" maxlength="800" rows=8 placeholder="请输入内容" @input="intro_limit('person')" v-model="form_person.introduce">
                                        </el-input>
                                    </el-form-item>
                                    <small style="position:absolute;color:#91B894;font-size:12px;right:20px;bottom:0;">还能输入{{ 800-form_person.introduce.length }}个字</small>
                                </el-col>
                            </el-row>                            

                            <el-col :span="24" style="margin-top:30px;">
                                <el-button type="primary" @click="onSubmit('person')">提交申请</el-button>
                            </el-col>
                        </el-form>
                    </el-tab-pane>
                <?php endif;?>
                <?php if ($levelOption == 0 || $levelOption == 2): ?>
                    <el-tab-pane label="<?=$levelOption == 2 ? '修改专家信息' : '仅专家'?>" name="expert">
                        <el-form ref="person" :model="form_person" :rules="person_rules" label-width="80px" label-position="left" style="margin-top:30px;">
                            <!--  -->
                            <div class="divider">个人基本信息</div>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="姓名：" prop="name">
                                        <el-input v-model="form_person.name" placeholder="请填写姓名 "></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="身份证：" prop="id_card">
                                        <el-input v-model="form_person.id_card" placeholder="请填写身份证号码 "></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="性别：" prop="gender">
                                        <el-radio v-model="form_person.gender" label="0">男</el-radio>
                                        <el-radio v-model="form_person.gender" label="1">女</el-radio>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="邮箱：" prop="email">
                                        <el-input v-model="form_person.email" placeholder="请填写邮箱"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="手机号：" prop="phone">
                                        <el-input v-model="form_person.phone" placeholder="请填写手机号"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="邮编：" prop="post_code">
                                        <el-input v-model="form_person.post_code" placeholder="请填写邮编"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="国籍：" prop="nationality">
                                        <el-input v-model="form_person.nationality" placeholder="请填写国籍"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="政治面貌：" prop="political_face">                                        
                                        <el-select v-model="form_person.political_face" placeholder="请选择" style="width:100%;">
                                            <el-option v-for="item in political_face_options" :key="item" :label="item" :value="item">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="籍贯：" prop="native_place">
                                        <el-input v-model="form_person.native_place" placeholder="请填写籍贯"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="民族：" prop="minzu">
                                        <el-input v-model="form_person.minzu" placeholder="请填写民族"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="住址：" prop="person_address">
                                        <el-input v-model="form_person.person_address" placeholder="请填写住址"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="微信号：" prop="wechat">
                                        <el-input v-model="form_person.wechat" placeholder="请填写微信号"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>

                            <div class="divider">学历教育信息</div>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="毕业院校：" prop="education_school">
                                        <el-input v-model="form_person.education_school" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="学历：" prop="education_degree">
                                        <el-select v-model="form_person.education_degree" placeholder="请选择" style="width:100%;">
                                            <el-option v-for="item in education_degree_options" :key="item" :label="item" :value="item">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="学位：" prop="education_degree_xw">
                                        <el-select v-model="form_person.education_degree_xw" placeholder="请选择" style="width:100%;">
                                            <el-option v-for="item in education_degree_xw_options" :key="item" :label="item" :value="item">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="专业：" prop="education_major">
                                        <el-input v-model="form_person.education_major" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>                                
                            </el-row>
                            <el-row type="flex" class="row-bg">                               
                                <el-col :span="12">
                                    <el-form-item label="毕业时间：" prop="education_time">
                                        <el-date-picker type="date" value-format="yyyy-MM-dd" placeholder="选择日期" v-model="form_person.education_time" style="width: 100%;"></el-date-picker>
                                    </el-form-item>
                                </el-col>
                            </el-row>

                            <div class="divider">工作信息</div>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="24">
                                    <el-form-item label="所在单位：" prop="belong_company">
                                        <el-input v-model="form_person.belong_company" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>                               
                            </el-row>
                            <el-row type="flex" class="row-bg">  
                                <el-col :span="12">
                                    <el-form-item label="职务：" prop="job">
                                        <el-input v-model="form_person.job" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>                              
                                <el-col :span="12">
                                    <el-form-item label="职称等级：" prop="positio">
                                        <el-select v-model="form_person.positio" multiple placeholder="请选择" style="width:100%;">
                                            <el-option v-for="(item,index) in positio_options" :key="index" :label="item" :value="item">
                                            </el-option>
                                        </el-select>                                        
                                    </el-form-item>
                                </el-col>                                
                            </el-row>                            
                            <el-row type="flex" class="row-bg">   
                                <el-col :span="12">
                                    <el-form-item label="业务行业：" prop="sector">
                                        <el-select v-model="form_person.sector" multiple placeholder="请选择" style="width:100%;">
                                            <el-option v-for="(item,index) in sector_options" :key="index" :label="item" :value="item">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-col>                             
                                <el-col :span="12">
                                    <el-form-item label="业务领域：" prop="area">
                                        <el-select v-model="form_person.area" multiple placeholder="请选择" style="width:100%;">
                                            <el-option v-for="(item,index) in area_options" :key="index" :label="item" :value="item">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-col>                                
                            </el-row>
                            <el-row type="flex" class="row-bg">     
                                <el-col :span="12">
                                    <el-form-item label="参加工作时间：" label-width="30%" prop="work_limit">
                                        <el-date-picker type="date" value-format="yyyy-MM-dd" placeholder="选择日期" v-model="form_person.work_limit" style="width: 100%;"></el-date-picker>
                                    </el-form-item>
                                </el-col>                           
                                <el-col :span="12">
                                    <el-form-item label="职称取得时间：" label-width="30%" prop="positio_time">
                                        <el-date-picker type="date" value-format="yyyy-MM-dd" placeholder="选择日期" v-model="form_person.positio_time" style="width: 100%;"></el-date-picker>
                                    </el-form-item>
                                </el-col>                                
                            </el-row>
                            <el-row type="flex" class="row-bg">                                                                
                                <el-col :span="12">
                                    <el-form-item label="高层次人才：" prop="highPeople" label-width="90px">
                                        <el-select v-model="form_person.highPeople" multiple placeholder="请选择" style="width:100%;">
                                            <el-option v-for="(item,index) in highPeopleOptions" :key="index" :label="item" :value="item">
                                            </el-option>
                                        </el-select>                                        
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="24">
                                    <el-form-item label="职业资格：" label-width="80px">
                                        <el-tag
                                        :key="tag"
                                        v-for="tag in form_person.pro_qualify"
                                        closable
                                        :disable-transitions="false"
                                        @close="handleClose1(tag)">
                                        {{tag}}
                                        </el-tag>
                                        <el-input
                                            class="input-new-tag"
                                            v-if="inputVisible1"
                                            v-model="inputValue1"
                                            ref="saveTagInput1"
                                            size="small"
                                            @keyup.enter.native="handleInputConfirm1"
                                            @blur="handleInputConfirm1"
                                        >
                                        </el-input>
                                        <el-button v-else class="button-new-tag" size="small" @click="showInput1">添加</el-button>                                                                                                                                                              
                                    </el-form-item>                                    
                                </el-col>                                
                            </el-row>                      
                            <!--  -->
                            <div class="divider" style="margin-top:25px;">等级</div>
                            <el-row>                                
                                <el-col :span="12" style="position:relative;">
                                    <el-form-item label="专家等级：" prop="expertLevel">
                                        <el-select v-model="form_person.expertLevel" placeholder="请选择" style="width:100%;">
                                            <el-option v-for="item in expertLevelOptions" :key="item" :label="item" :value="item">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <!--  -->
                            <div class="divider" style="margin-top:25px;">图片信息</div>
                            <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;">
                                <el-col :span="20" style="display:flex;align-items:center;">
                                    <label style="margin:0;">个人证件照：<small style="color:#999999;font-weight:100;font-size:10px;">（推荐上传1寸&2寸的JPG&PNG图片，且不超过2MB）</small>
                                    </label>
                                </el-col>
                            </el-row>

                            <div style="padding:20px 0px;">
                                <el-upload class="avatar-uploader" action="<?=url('uploadFile')?>&param=idcard" ref="idcard" :show-file-list="false" :on-success="handleIdcardSuccess" :before-upload="beforeAvatarUpload">
                                    <img v-if="idPhotoUrl" :src="idPhotoUrl" class="avatar">
                                    <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                                </el-upload>
                            </div>

                            <!-- PDF -->
                            <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;">
                                <el-col :span="20" style="display:flex;align-items:center;">
                                    <label style="margin:0;">个人证件附件：<small style="color:#999999;font-weight:100;font-size:10px;">（学历和学位、职称、职业资格、高层次人才等证书制成一个PDF文件上传，且不超过2MB）</small>
                                    </label>
                                </el-col>
                            </el-row>

                            <div style="padding:20px 0px;">
                                <el-upload class="avatar-uploader" action="<?=url('uploadFile')?>&param=personfile" ref="personFile" accept=".pdf" :show-file-list="false" :on-success="handlePersonFileSuccess" :before-upload="beforeFileUpload">
                                    <img v-if="personFileUrl" :src="personFileUrl" class="avatar">
                                    <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                                </el-upload>
                            </div>

                            <div class="divider" style="margin-top:25px;">个人简介</div>

                            <el-row>
                                <el-col :span="24" style="position:relative;">
                                    <el-form-item label="简介描述" prop="introduce">
                                        <el-input type="textarea" maxlength="800" rows=8 placeholder="请输入内容" @input="intro_limit('expert')" v-model="form_person.introduce">
                                        </el-input>
                                    </el-form-item>
                                    <small style="position:absolute;color:#91B894;font-size:12px;right:20px;bottom:0;">还能输入{{ 800-form_person.introduce.length }}个字</small>
                                </el-col>
                            </el-row>                            

                            <el-col :span="24" style="margin-top:30px;">
                                <el-button type="primary" @click="onSubmit('person')">提交申请</el-button>
                            </el-col>
                        </el-form>
                    </el-tab-pane>
                <?php endif;?>
                <?php if ($levelOption == 0 || $levelOption == 3): ?>
                    <el-tab-pane label="<?=$levelOption == 3 ? '修改单位会员+供应商信息' : '单位会员+供应商'?>" name="company">
                        <el-form ref="company" :model="form_company" :rules="company_rules" label-width="80px" label-position="left" style="margin-top:30px;">
                            <!--  -->
                            <div class="divider">单位基本信息</div>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="24">
                                    <el-form-item label="单位名称：" prop="company_name">
                                        <el-input v-model="form_company.company_name" placeholder="请填写单位名称"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="成立时间：" prop="build_time">
                                        <el-date-picker type="date" value-format="yyyy-MM-dd" placeholder="选择日期" v-model="form_company.build_time" style="width: 100%;"></el-date-picker>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="单位法人：" class="" prop="legal_person">
                                        <el-input v-model="form_company.legal_person" placeholder="请填写单位法人"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="统一社会信用代码：" label-width="140px" prop="company_code">
                                        <el-input v-model="form_company.company_code" placeholder="请填写单位的统一社会信用代码"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="单位类型：" class="" prop="company_type">
                                        <el-select v-model="form_company.company_type" placeholder="请选择单位类型" style="width:100%;">
                                            <el-option v-for="item in companyTypeOptions" :key="item" :label="item" :value="item">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-col>
                            </el-row>                            
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="公司电话：" prop="company_tel">
                                        <el-input v-model="form_company.company_tel" placeholder="0898-66666666"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="单位邮箱：" class="" prop="email">
                                        <el-input type="email" v-model="form_company.email" placeholder="xx@xx.com"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="地址：" prop="address">
                                        <el-input v-model="form_company.address" placeholder="请填写公司地址"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="邮编：" prop="post_code">
                                        <el-input v-model="form_company.post_code" placeholder="请填写邮编"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>

                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="注册资金（万元）：" label-width="140px" prop="regist_money">
                                        <el-input v-model.number="form_company.regist_money" placeholder="请填写注册资金" @keyup.native="proving1('company')"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="门户网站：" prop="company_site">
                                        <el-input v-model="form_company.company_site" placeholder="请填写门户网站"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="24">
                                    <el-form-item label="传真">
                                        <el-input v-model="form_company.company_fax" placeholder="请填写单位传真"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>

                            <!--  -->
                            <div class="divider" style="margin-top:25px;">联系人基本信息</div>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="姓名：" prop="manager_name">
                                        <el-input v-model="form_company.manager_name" placeholder="请填写联系人姓名"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="单位职务：" class="" prop="manager_job">
                                        <el-input type="email" v-model="form_company.manager_job" placeholder="请填写联系人职务"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="联系手机：" prop="manager_phone">
                                        <el-input v-model.number="form_company.manager_phone" placeholder="请填写联系人手机"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="微信号：" class="" prop="manager_wechat">
                                        <el-input v-model="form_company.manager_wechat" placeholder="请填写联系人微信号"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>


                            <!-- cates -->
                            <div class="divider" style="margin-top:25px;">供应类别</div>
                            <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;">
                                <el-col :span="22">
                                    工程类
                                </el-col>
                                <el-col :span="2" style="color:#7FBAFF;">
                                    <i class="el-icon-plus"></i>
                                    <span type="text" @click="addCate('eng','company')" style="cursor:pointer;">新类别</span>
                                </el-col>
                            </el-row>
                            <div style="padding:20px 0px;">
                                <el-row type="flex" class="row-bg" v-for="(item,index) in form_company.eng_cate" :key="index">
                                    <el-col :span="12">
                                        <el-form-item :label="'资质标准类别'+(index+1)" label-width="100px">
                                            <el-input v-model="item.cate" placeholder=""></el-input>
                                        </el-form-item>
                                    </el-col>
                                    <el-col :span="11">
                                        <el-form-item label="资质类别等级：" label-width="100px">
                                            <el-input v-model="item.level" placeholder=""></el-input>
                                        </el-form-item>
                                    </el-col>
                                    <el-col :span="1" v-if="index>0">
                                        <el-button style="margin-top:.5rem;" type="danger" size="mini" icon="el-icon-close" circle @click="delCate('eng',index,'company')"></el-button>
                                    </el-col>
                                </el-row>
                            </div>

                            <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;">
                                <el-col :span="22">
                                    货物类
                                </el-col>
                                <el-col :span="2" style="color:#7FBAFF;">
                                    <i class="el-icon-plus"></i>
                                    <span type="text" @click="addCate('goods','company')" style="cursor:pointer;">新类别</span>
                                </el-col>
                            </el-row>
                            <div style="padding:20px 0px;">
                                <el-row type="flex" class="row-bg" v-for="(item,index) in form_company.goods_cate" :key="index">
                                    <el-col :span="12">
                                        <el-form-item :label="'生产销售许可'+(index+1)" label-width="100px">
                                            <el-input v-model="item.permit" placeholder=""></el-input>
                                        </el-form-item>
                                    </el-col>
                                    <el-col :span="11">
                                        <el-form-item label="供应内容：" label-width="80px">
                                            <el-input v-model="item.content" placeholder=""></el-input>
                                        </el-form-item>
                                    </el-col>
                                    <el-col :span="1" v-if="index>0">
                                        <el-button style="margin-top:.5rem;" type="danger" size="mini" icon="el-icon-close" circle @click="delCate('goods',index,'company')"></el-button>
                                    </el-col>
                                </el-row>
                            </div>

                            <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;">
                                <el-col :span="22">
                                    服务类
                                </el-col>
                                <el-col :span="2" style="color:#7FBAFF;">
                                    <i class="el-icon-plus"></i>
                                    <span @click="addCate('server','company')" style="cursor:pointer;" type="text">新类别</span>
                                </el-col>
                            </el-row>
                            <div style="padding:20px 0px;">
                                <el-row type="flex" class="row-bg" v-for="(item,index) in form_company.server_cate" :key="index">
                                    <el-col :span="8">
                                        <el-form-item :label="'资质资格资信专业'+(index+1)" label-width="130px">
                                            <el-input v-model="item.major" placeholder=""></el-input>
                                        </el-form-item>
                                    </el-col>
                                    <el-col :span="7">
                                        <el-form-item label="资质类别等级：" label-width="100px">
                                            <el-input v-model="item.level" placeholder=""></el-input>
                                        </el-form-item>
                                    </el-col>
                                    <el-col :span="8">
                                        <el-form-item label="业务领域：" label-width="80px">
                                            <el-select v-model="item.area" multiple placeholder="请选择" style="width:100%;">
                                                <el-option v-for="(e,i) in area_options" :key="i" :label="e" :value="e">
                                                </el-option>
                                            </el-select>
                                        </el-form-item>
                                    </el-col>
                                    <el-col :span="1" v-if="index>0">
                                        <el-button style="margin-top:.5rem;" type="danger" size="mini" icon="el-icon-close" circle @click="delCate('server',index,'company')"></el-button>
                                    </el-col>
                                </el-row>
                            </div>


                            <!--  -->
                            <div class="divider" style="margin-top:25px;">图片信息</div>
                            <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;">
                                <el-col :span="20" style="display:flex;align-items:center;">
                                    <label style="margin:0;">单位LOGO图片：<small style="color:#999999;font-weight:100;font-size:10px;">（推荐上传1:1的JPG&PNG图片，且不超过2MB）</small>
                                    </label>
                                </el-col>
                            </el-row>

                            <div style="padding:20px 0px;">
                                <el-upload class="avatar-uploader" action="<?=url('uploadFile')?>&param=logo" ref="avatar" :show-file-list="false" :on-success="handleAvatarSuccess" :before-upload="beforeAvatarUpload">
                                    <img v-if="imageUrl" :src="imageUrl" class="avatar">
                                    <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                                </el-upload>
                            </div>

                            <!-- PDF -->
                            <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;">
                                <el-col :span="20" style="display:flex;align-items:center;">
                                    <label style="margin:0;">证件附件：<small style="color:#999999;font-weight:100;font-size:10px;">（请将营业执照护本、工程服务资质资格资信等证书制成一个PDF文件上传，且不超过2MB）</small>
                                    </label>
                                </el-col>
                            </el-row>

                            <div style="padding:20px 0px;">
                                <el-upload class="avatar-uploader" action="<?=url('uploadFile')?>&param=companyFile" ref="upload" accept=".pdf" :show-file-list="false" :on-success="handleFileSuccess" :before-upload="beforeFileUpload">
                                    <img v-if="fileUrl" :src="fileUrl" class="avatar">
                                    <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                                </el-upload>
                            </div>

                            <div class="divider" style="margin-top:25px;">单位简介</div>

                            <el-row>
                                <el-col :span="24" style="position:relative;">
                                    <el-form-item label="简介描述" prop="company_intro">
                                        <el-input type="textarea" maxlength="800" rows=8 placeholder="请输入内容" @input="intro_limit('company')" v-model="form_company.company_intro">
                                        </el-input>
                                    </el-form-item>
                                    <small style="position:absolute;color:#91B894;font-size:12px;right:20px;bottom:0;">还能输入{{ 800-form_company.company_intro.length }}个字</small>
                                </el-col>
                            </el-row>

                            <el-row>
                                <el-col :span="24" style="position:relative;">
                                    <el-form-item label="会员等级：" prop="memberLevel">
                                        <el-select v-model="form_company.memberLevel" placeholder="请选择">
                                            <el-option v-for="item in levelOptions" :key="item" :label="item" :value="item">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-col>
                            </el-row>


                            <el-col :span="24" style="margin-top:30px;">
                                <el-button type="primary" @click="onSubmit('company')">提交申请</el-button>
                            </el-col>
                        </el-form>
                    </el-tab-pane>
                <?php endif;?>
                <?php if ($levelOption == 0 || $levelOption == 4): ?>
                <el-tab-pane label="<?=in_array(4, $roleArr) ? '修改供应商信息' : '仅供应商'?>" name="supplier">
                    <el-form ref="sup" :model="form_sup" :rules="supplier_rules" label-width="80px" label-position="left" style="margin-top:30px;">
                        <!--  -->
                        <div class="divider">供应商单位基本信息</div>
                        <el-row type="flex" class="row-bg">
                            <el-col :span="24">
                                <el-form-item label="单位名称：" prop="sup_company_name">
                                    <el-input v-model="form_sup.sup_company_name" placeholder="请填写单位名称"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        <el-row type="flex" class="row-bg">
                            <el-col :span="12">
                                <el-form-item label="成立时间：" prop="sup_build_time">
                                    <el-date-picker type="date" value-format="yyyy-MM-dd" placeholder="选择日期" v-model="form_sup.sup_build_time" style="width: 100%;"></el-date-picker>
                                </el-form-item>
                            </el-col>
                            <el-col :span="12">
                                <el-form-item label="单位类型：" class="" prop="sup_company_type">
                                    <!-- <el-input v-model="form_sup.sup_company_type" placeholder="请选择单位类型"></el-input> -->
                                    <el-select v-model="form_sup.sup_company_type" placeholder="请选择单位类型" style="width:100%;">
                                        <el-option v-for="item in companyTypeOptions" :key="item" :label="item" :value="item">
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        <el-row type="flex" class="row-bg">
                            <el-col :span="12">
                                <el-form-item label="统一社会信用代码：" label-width="140px" prop="sup_company_code">
                                    <el-input v-model="form_sup.sup_company_code" placeholder="XXXXXXX"></el-input>
                                </el-form-item>
                            </el-col>
                            <el-col :span="12">
                                <el-form-item label="单位法人：" class="" prop="sup_legal_person">
                                    <el-input v-model="form_sup.sup_legal_person" placeholder="请填写单位法人"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        <el-row type="flex" class="row-bg">
                            <el-col :span="12">
                                <el-form-item label="单位电话：" prop="sup_company_tel">
                                    <el-input v-model.number="form_sup.sup_company_tel" placeholder="0898-66666666"></el-input>
                                </el-form-item>
                            </el-col>
                            <el-col :span="12">
                                <el-form-item label="单位邮箱：" class="" prop="sup_company_email">
                                    <el-input type="email" v-model="form_sup.sup_company_email" placeholder="xx@xx.com"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        <el-row type="flex" class="row-bg">
                            <el-col :span="12">
                                <el-form-item label="地址：" prop="sup_company_address">
                                    <el-input v-model="form_sup.sup_company_address" placeholder="请填写公司地址"></el-input>
                                </el-form-item>
                            </el-col>
                            <el-col :span="12">
                                <el-form-item label="邮编：" prop="sup_post_code">
                                    <el-input v-model="form_sup.sup_post_code" placeholder="请填写邮编"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        <el-row type="flex" class="row-bg">
                            <el-col :span="12">
                                <el-form-item label="注册资金（万元）：" label-width="140px" prop="sup_regist_money">
                                    <el-input v-model.number="form_sup.sup_regist_money" placeholder="请填写注册资金" @keyup.native="proving1('sup')"></el-input>
                                </el-form-item>
                            </el-col>
                            <el-col :span="12">
                                <el-form-item label="门户网站：" prop="sup_company_site">
                                    <el-input v-model="form_sup.sup_company_site" placeholder="请填写门户网站"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        <el-row type="flex" class="row-bg">
                            <el-col :span="24">
                                <el-form-item label="传真" prop="sup_company_fax">
                                    <el-input v-model="form_sup.sup_company_fax" placeholder="请填写供应商传真"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>

                        <!--  -->
                        <div class="divider" style="margin-top:25px;">联系人基本信息</div>
                        <el-row type="flex" class="row-bg">
                            <el-col :span="12">
                                <el-form-item label="姓名：" prop="sup_manager_name">
                                    <el-input v-model="form_sup.sup_manager_name" placeholder="请填写联系人姓名"></el-input>
                                </el-form-item>
                            </el-col>
                            <el-col :span="12">
                                <el-form-item label="单位职务：" class="" prop="sup_manager_job">
                                    <el-input type="email" v-model="form_sup.sup_manager_job" placeholder="请填写联系人职务"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        <el-row type="flex" class="row-bg">
                            <el-col :span="12">
                                <el-form-item label="联系手机：" prop="sup_manager_phone">
                                    <el-input v-model.number="form_sup.sup_manager_phone" placeholder="请填写联系人手机"></el-input>
                                </el-form-item>
                            </el-col>
                            <el-col :span="12">
                                <el-form-item label="微信号：" class="" prop="sup_manager_wechat">
                                    <el-input v-model="form_sup.sup_manager_wechat" placeholder="请填写联系人微信号"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>

                        <!-- cates -->
                        <div class="divider" style="margin-top:25px;">供应类别</div>
                        <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;">
                            <el-col :span="22">
                                工程类
                            </el-col>
                            <el-col :span="2" style="color:#7FBAFF;">
                                <i class="el-icon-plus"></i>
                                <span type="text" @click="addCate('eng','sup')" style="cursor:pointer;">新类别</span>
                            </el-col>
                        </el-row>
                        <div style="padding:20px 0px;">
                            <el-row type="flex" class="row-bg" v-for="(item,index) in form_sup.sup_eng_cate" :key="index">
                                <el-col :span="12">
                                    <el-form-item :label="'资质标准类别'+(index+1)" label-width="100px">
                                        <el-input v-model="item.cate" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="11">
                                    <el-form-item label="资质类别等级：" label-width="100px">
                                        <el-input v-model="item.level" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="1" v-if="index>0">
                                    <el-button style="margin-top:.5rem;" type="danger" size="mini" icon="el-icon-close" circle @click="delCate('eng',index,'sup')"></el-button>
                                </el-col>
                            </el-row>
                        </div>

                        <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;">
                            <el-col :span="22">
                                货物类
                            </el-col>
                            <el-col :span="2" style="color:#7FBAFF;">
                                <i class="el-icon-plus"></i>
                                <span type="text" @click="addCate('goods','sup')" style="cursor:pointer;">新类别</span>
                            </el-col>
                        </el-row>
                        <div style="padding:20px 0px;">
                            <el-row type="flex" class="row-bg" v-for="(item,index) in form_sup.sup_goods_cate" :key="index">
                                <el-col :span="12">
                                    <el-form-item :label="'生产销售许可'+(index+1)" label-width="100px">
                                        <el-input v-model="item.permit" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="11">
                                    <el-form-item label="供应内容：" label-width="80px">
                                        <el-input v-model="item.content" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="1" v-if="index>0">
                                    <el-button style="margin-top:.5rem;" type="danger" size="mini" icon="el-icon-close" circle @click="delCate('goods',index,'sup')"></el-button>
                                </el-col>
                            </el-row>
                        </div>

                        <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;">
                            <el-col :span="22">
                                服务类
                            </el-col>
                            <el-col :span="2" style="color:#7FBAFF;">
                                <i class="el-icon-plus"></i>
                                <span @click="addCate('server','sup')" style="cursor:pointer;" type="text">新类别</span>
                            </el-col>
                        </el-row>
                        <div style="padding:20px 0px;">
                            <el-row type="flex" class="row-bg" v-for="(item,index) in form_sup.sup_server_cate" :key="index">
                                <el-col :span="12">
                                    <el-form-item :label="'资质资格资信专业'+(index+1)" label-width="130px">
                                        <el-input v-model="item.major" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="11">
                                    <el-form-item label="资质类别等级：" label-width="100px">
                                        <el-input v-model="item.level" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="1" v-if="index>0">
                                    <el-button style="margin-top:.5rem;" type="danger" size="mini" icon="el-icon-close" circle @click="delCate('server',index,'sup')"></el-button>
                                </el-col>
                            </el-row>
                        </div>






                        <!--  -->
                        <div class="divider" style="margin-top:25px;">图片信息</div>
                        <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;">
                            <el-col :span="20" style="display:flex;align-items:center;">
                                <label style="margin:0;">单位LOGO图片：<small style="color:#999999;font-weight:100;font-size:10px;">（推荐上传1:1的JPG&PNG图片，且不超过2MB）</small>
                                </label>
                            </el-col>
                        </el-row>

                        <div style="padding:20px 0px;">
                            <el-upload class="avatar-uploader" action="<?=url('uploadFile')?>&param=supIdFile" ref="avatar" :show-file-list="false" :on-success="handleSupIdPhotoSuccess" :before-upload="beforeAvatarUpload">
                                <img v-if="supIdPhotoUrl" :src="supIdPhotoUrl" class="avatar">
                                <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                            </el-upload>
                        </div>

                        <!-- PDF -->
                        <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;">
                            <el-col :span="20" style="display:flex;align-items:center;">
                                <label style="margin:0;">证件附件：<small style="color:#999999;font-weight:100;font-size:10px;">（将营业执照副本、资质资格资质、生产直销认可证或销售授权书等制成一个PDF文件上传，且不超过2MB）</small>
                                </label>
                            </el-col>
                        </el-row>

                        <div style="padding:20px 0px;">
                            <el-upload class="avatar-uploader" action="<?=url('uploadFile')?>&param=supFile" ref="upload" accept=".pdf" :show-file-list="false" :on-success="handleSupFileSuccess" :before-upload="beforeFileUpload">
                                <img v-if="supFileUrl" :src="supFileUrl" class="avatar">
                                <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                            </el-upload>
                        </div>

                        <div class="divider" style="margin-top:25px;">供应商简介</div>

                        <el-row>
                            <el-col :span="24" style="position:relative;">
                                <el-form-item label="简介描述" prop="sup_intro">
                                    <el-input type="textarea" maxlength="800" rows=8 placeholder="请输入内容" @input="intro_limit('sup')" v-model="form_sup.sup_intro">
                                    </el-input>
                                </el-form-item>
                                <small style="position:absolute;color:#91B894;font-size:12px;right:20px;bottom:0;">还能输入{{ 800-form_sup.sup_intro.length }}个字</small>
                            </el-col>
                        </el-row>



                        <el-col :span="24" style="margin-top:30px;">
                            <el-button type="primary" @click="onSubmit('sup')">提交申请</el-button>
                        </el-col>
                    </el-form>
                </el-tab-pane>
                <?php endif;?>
            </el-tabs>
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

<!--  -->
<script>
    $.get('<?=url('updateExistAjax')?>', function(res) {
        //
        var data = res.data;

        console.log(data);
        //
        window.vue = new Vue({
            el: '#app',
            data: {                
                inputVisible: false,
                inputValue: '',
                inputVisible1: false,
                inputValue1: '',
                // 
                posting: false,
                activeName: '',
                imageUrl: '',
                fileUrl: '',
                idPhotoUrl: '',
                personFileUrl: '',
                supIdPhotoUrl: '',
                supFileUrl: '',
                levelOptions: [
                    '会长单位',
                    '常务副会长单位',
                    '副会长单位',
                    '常务理事单位',
                    '理事单位',
                    '监事长单位',
                    '常务副监事长单位',
                    '副监事长单位',
                    '常务监事单位',
                    '监事单位',
                    '会员单位'
                ],
                levelPersonOptions: [
                    '会长',
                    '监事长',
                    '常务副会长',
                    '常务副监事长',
                    '副会长',
                    '副监事长',
                    '秘书长',
                    '副秘书长',
                    '常务理事',
                    '常务监事',
                    '理事',
                    '监事',
                    '会员'                    
                ],
                expertLevelOptions:[
                    '高级专家',
                    '资深专家',
                    '顶级专家'
                ],
                companyTypeOptions: [
                    '海南全内资独立法人',
                    '外省全内资独立法人驻琼机构',
                    '国内内资控股或主导独立法人',
                    '其他机构'
                ],
                highPeopleOptions:[
                    '院士',
                    '长江学者',
                    '百人计划',
                    '杰青优青',
                    '千人计划',
                    '万人计划',
                    '双一流学术带头人',
                    '其他顶尖人才'
                ],
                education_degree_options:[
                    '中等专科',
                    '大学专科',
                    '大学本科',
                    '研究生'
                ],
                education_degree_xw_options:[
                    '无学位',
                    '学士',
                    '硕士',
                    '博士'
                ],
                political_face_options:[
                    '中共党员',
                    '民主党派人士',
                    '无党派人士',
                    '境外党派人士'
                ],                
                positio_options:[
                    '正高级工程师','教授','研究员','高级工程师','副教授','副研究员'
                ],
				sector_options:[
					'农林水利','交通运输','能源','城市基础设施','社会事业','科学','公检法司','高技术','信息化','环保','国防军工','工业','地质','医药','仓储物流','其他'
				],
                area_options:[
                    '投资咨询','招标代理','勘察测量','规划设计','工程监理','造价咨询','项目管理','其他工程服务'
                ],
                // 个人
                form_person: {
                    name: '',
                    id_card: '',
                    gender: '',
                    email: '',
                    phone: '',
                    post_code: '',
                    person_address: '',
                    education_school: '',
                    education_degree: '',
                    education_major: '',
                    education_time: '',
                    belong_company: '',
                    positio: '',
                    job: '',
                    work_limit: '',
                    positio_time: '',
                    sector: '',
                    area: '',
                    id_photo: '',
                    person_file: '',
                    introduce: '',
                    memberLevel: '',
                    expertLevel:'',
                    highPeople:'',
                    pro_qualify:[],
                    nationality: '',
                    political_face: '',
                    native_place: '',
                    minzu: '',
                    wechat: '',
                },
                person_rules: {
                    name: [{
                        required: true,
                        message: '请填写姓名',
                        trigger: 'blur'
                    }],
                    id_card: [{
                        required: true,
                        message: '请填写身份证号码',
                        trigger: 'blur'
                    }, {
                        pattern: /^[1-9]\d{5}(18|19|20)\d{2}((0[1-9])|(1[0-2]))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$/,
                        message: '身份证号码格式错误',
                        trigger: 'blur'
                    }],
                    gender: [{
                        required: true,
                        message: '请选择性别',
                        trigger: 'change'
                    }],
                    email: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }, {
                        type: 'email',
                        message: '请填写正确的邮箱格式！'
                    }],
                    phone: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    post_code: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    person_address: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    education_school: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    education_degree: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    education_degree_xw:[{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    education_major: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    education_time: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    belong_company: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    positio: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    job: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    work_limit: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    positio_time: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sector: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    area: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    introduce: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    memberLevel: [{
                        required: true,
                        message: '请选择内容',
                        trigger: 'blur'
                    }],
                    expertLevel: [{
                        required: true,
                        message: '请选择内容',
                        trigger: 'blur'
                    }],
                    nationality: [{
                        required: true,
                        message: '请选择内容',
                        trigger: 'blur'
                    }],
                    political_face: [{
                        required: true,
                        message: '请选择内容',
                        trigger: 'blur'
                    }],
                    native_place: [{
                        required: true,
                        message: '请选择内容',
                        trigger: 'blur'
                    }],
                    minzu: [{
                        required: true,
                        message: '请选择内容',
                        trigger: 'blur'
                    }],
                    wechat: [{
                        required: true,
                        message: '请选择内容',
                        trigger: 'blur'
                    }]
                },
                // 单位
                form_company: {
                    company_name: '',
                    build_time: '',
                    legal_person: '',
                    company_code: '',
                    company_type: '',               
                    company_tel: '',
                    address: '',
                    post_code:'',
                    email: '',
                    manager_name: '',
                    manager_job: '',
                    manager_phone: '',
                    manager_wechat: '',
                    company_logo: '',
                    license_file: '',
                    company_intro: '',
                    memberLevel: '',
                    regist_money: '',
                    company_site: '',
                    company_fax: '',
                    eng_cate: [{
                        cate: '',
                        level: ''
                    }],
                    goods_cate: [{
                        permit: '',
                        content: ''
                    }],
                    server_cate: [{
                        major: '',
                        level: '',
                        area:''
                    }],
                },
                company_rules: {
                    company_name: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    build_time: [{
                        required: true,
                        message: '请选择日期',
                        trigger: 'blur'
                    }],
                    legal_person: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    company_code: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    company_type: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],                    
                    company_tel: [{
                        required: true,
                        message: '请输入公司电话',
                        trigger: 'blur'
                    }],
                    address: [{
                        required: true,
                        message: '请输入公司地址',
                        trigger: 'blur'
                    }],
                    post_code:[{
                        required: true,
                        message: '请输入邮编',
                        trigger: 'blur'
                    }],
                    email: [{
                            required: true,
                            message: '请输入单位邮箱',
                            trigger: 'blur'
                        },
                        {
                            type: 'email',
                            message: '请填写邮箱格式'
                        }
                    ],
                    manager_name: [{
                        required: true,
                        message: '请输入联系人姓名',
                        trigger: 'blur'
                    }],
                    manager_job: [{
                        required: true,
                        message: '请输入联系人职务',
                        trigger: 'blur'
                    }],
                    manager_phone: [{
                            required: true,
                            message: '请输入联系人电话',
                            trigger: 'blur'
                        },
                        {
                            type: 'number',
                            message: '必须为数字'
                        }
                    ],
                    manager_wechat: [{
                        required: true,
                        message: '请输入联系人微信号',
                        trigger: 'blur'
                    }],
                    company_intro: [{
                        required: true,
                        message: '请输入公司简介',
                        trigger: 'blur'
                    }],
                    memberLevel: [{
                        required: true,
                        message: '请选择内容',
                        trigger: 'blur'
                    }],
                    regist_money: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],                                     
                },
                // 供应商
                form_sup: {
                    sup_company_name: '',
                    sup_build_time: '',
                    sup_company_type: '',
                    sup_company_code: '',
                    sup_legal_person: '',
                    sup_company_tel: '',
                    sup_company_email: '',
                    sup_company_address: '',
                    sup_post_code: '',
                    sup_manager_name: '',
                    sup_manager_job: '',
                    sup_manager_phone: '',
                    sup_manager_wechat: '',
                    sup_eng_cate: [{
                        cate: '',
                        level: ''
                    }],
                    sup_goods_cate: [{
                        permit: '',
                        content: ''
                    }],
                    sup_server_cate: [{
                        major: '',
                        level: '',
                        area:''
                    }],
                    id_photo: '',
                    person_file: '',
                    sup_intro: '',
                    sup_regist_money: '',
                    sup_company_site: '',
                    sup_company_fax: ''
                },
                supplier_rules: {
                    sup_company_name: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_build_time: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_company_type: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_company_code: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_legal_person: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_company_tel: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }, {
                        type: 'number',
                        message: '必须为数字'
                    }],
                    sup_company_email: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }, {
                        type: 'email',
                        message: '请填写邮箱格式'
                    }],
                    sup_company_address: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_post_code: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_manager_name: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_manager_job: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_manager_phone: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }, {
                        type: 'number',
                        message: '必须为数字'
                    }],
                    sup_manager_wechat: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_intro: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_regist_money: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],                    
                }
            },
            methods: {
                proving1(type){
                    let obj;
                    switch (type) {
                        case 'company':
                            obj = this.form_company.regist_money;
                            break;
                    
                        case 'sup':
                            obj = this.form_sup.sup_regist_money;
                            break;
                    }                    
                    obj=String(obj).replace(/[^\.\d]/g,'');
                    obj=String(obj).replace('.','');
                },
                handleClose(tag) {
                    this.form_person.pro_qualify.splice(this.form_person.pro_qualify.indexOf(tag), 1);
                },
                handleClose1(tag) {
                    this.form_person.pro_qualify.splice(this.form_person.pro_qualify.indexOf(tag), 1);
                },
                showInput() {
                    this.inputVisible = true;
                    this.$nextTick(_ => {                                               
                        this.$refs.saveTagInput.$refs.input.focus();
                    });
                },
                showInput1() {
                    this.inputVisible1 = true;
                    this.$nextTick(_ => {                                               
                        this.$refs.saveTagInput1.$refs.input.focus();
                    });
                },
                handleInputConfirm() {
                    let inputValue = this.inputValue;
                    if (inputValue) {
                    this.form_person.pro_qualify.push(inputValue);
                    }
                    this.inputVisible = false;
                    this.inputValue = '';
                },
                handleInputConfirm1() {
                    let inputValue = this.inputValue1;
                    if (inputValue) {
                    this.form_person.pro_qualify.push(inputValue);
                    }
                    this.inputVisible1 = false;
                    this.inputValue1 = '';
                },
                // 
                doPost(form) {
                    if (!this.posting) {
                        this.posting = true;
                        var _this = this;
                        $.post('<?=url('updateAjax')?>', {
                            form: form,
                            form_type: _this.activeName
                        }, function(res) {
                            console.log(res);
                            if (res.code == 1) {
                                _this.$message.success(res.msg);
                                setTimeout(function() {
                                    window.location.href = '<?=url('personcenter')?>'
                                }, 1000);
                                //
                            } else {
                                _this.$message.error(res.msg);
                                _this.posting = false;
                            }
                        });
                    } else {

                    }
                },
                handleClick(tab, event) {

                },
                onSubmit(type) {

                    switch (type) {
                        case 'person':
                            this.$refs['person'].validate((valid) => {
								if(this.form_person.gender==''){
									this.$message.error('请选择性别');
								}else{
									if (valid) {
										if (this.form_person.id_photo && this.form_person.person_file) {
											this.doPost(this.form_person);
										} else {
											this.$message.error('请上传相应图片和附件');
										}	
									} else {									
										console.log('error submit!!');
										return false;
									}	
								}
                            });
                            break;
                        case 'company':
                            if (this.cate_valid('company')) {
                                this.$refs['company'].validate((valid) => {
                                    if (valid) {
                                        if (this.form_company.company_logo && this.form_company.license_file) {
                                            this.doPost(this.form_company);
                                        } else {
                                            this.$message.error('请上传相应图片和附件');
                                        }
                                    } else {
                                        console.log('error submit!!');
                                        return false;
                                    }
                                });
                            }
                            break;
                        case 'sup':
                            if (this.cate_valid('sup')) {
                                this.$refs['sup'].validate((valid) => {
                                    if (valid) {
                                        if (this.form_sup.id_photo && this.form_sup.person_file) {
                                            this.doPost(this.form_sup);
                                        } else {
                                            this.$message.error('请上传相应图片和附件');
                                        }
                                    } else {
                                        console.log('error submit!!');
                                        return false;
                                    }
                                });
                            }
                            break;
                        case 'expert':
                            this.doPost([]);
                            break;
                    }

                },
                handleSupIdPhotoSuccess(res, file) {
                    if (res.code == 1) {
                        this.supIdPhotoUrl = URL.createObjectURL(file.raw);
                        this.$message.success(res.msg);
                        this.form_sup.id_photo = res.data.file_id;
                        //
                    } else {
                        this.$message.error(res.msg);
                    }
                },
                handleIdcardSuccess(res, file) {
                    if (res.code == 1) {
                        this.idPhotoUrl = URL.createObjectURL(file.raw);
                        this.$message.success(res.msg);
                        this.form_person.id_photo = res.data.file_id;
                        //
                    } else {
                        this.$message.error(res.msg);
                    }
                },
                handleAvatarSuccess(res, file) {
                    if (res.code == 1) {
                        this.imageUrl = URL.createObjectURL(file.raw);
                        this.$message.success(res.msg);
                        this.form_company.company_logo = res.data.file_id;
                        //
                    } else {
                        this.$message.error(res.msg);
                    }
                },
                handleSupFileSuccess(res, file) {
                    if (res.code == 1) {
                        this.supFileUrl = 'assets/home/images/pdf-icon.png';
                        this.$message.success(res.msg);
                        this.form_sup.person_file = res.data.file_id;
                        //
                    } else {
                        this.$message.error(res.msg);
                    }
                },
                handlePersonFileSuccess(res, file) {
                    if (res.code == 1) {
                        this.personFileUrl = 'assets/home/images/pdf-icon.png';
                        this.$message.success(res.msg);
                        this.form_person.person_file = res.data.file_id;
                        //
                    } else {
                        this.$message.error(res.msg);
                    }
                },
                handleFileSuccess(res, file) {
                    if (res.code == 1) {
                        this.fileUrl = 'assets/home/images/pdf-icon.png';
                        this.$message.success(res.msg);
                        this.form_company.license_file = res.data.file_id;
                        //
                    } else {
                        this.$message.error(res.msg);
                    }
                },
                beforeAvatarUpload(file) {
                    const isJPG = (file.type === 'image/jpeg' || file.type === 'image/png');
                    const isLt2M = file.size / 1024 / 1024 < 2;

                    if (!isJPG) {
                        this.$message.error('上传头像图片只能是 JPG&PNG 格式!');
                    }
                    if (!isLt2M) {
                        this.$message.error('上传头像图片大小不能超过 2MB!');
                    }
                    return isJPG && isLt2M;
                },
                beforeFileUpload(file) {
                    const isPDF = file.type === 'application/pdf';
                    const isLt2M = file.size / 1024 / 1024 < 2;
                    if (!isPDF) {
                        this.$message.error('上传文件只能是 PDF 格式!');
                    }
                    if (!isLt2M) {
                        this.$message.error('上传文件大小不能超过 2MB!');
                    }
                    return isPDF && isLt2M;
                },
                intro_limit(type) {
                    //
                    if (type == 'company') {
                        if (this.form_company.company_intro.length >= 800) {
                            this.form_company.company_intro = this.form_company.company_intro.substring(0, 800);
                        }
                    } else if (type == 'person' || type == 'expert') {
                        if (this.form_person.introduce.length >= 800) {
                            this.form_person.introduce = this.form_person.introduce.substring(0, 800);
                        }
                    } else if (type == 'sup') {
                        if (this.form_sup.sup_intro.length >= 800) {
                            this.form_sup.sup_intro = this.form_sup.sup_intro.substring(0, 800);
                        }
                    }

                },
                // supplier
                addCate(type,form_type) {
                    let obj,d;                    
                    switch (type) {
                        case 'eng':
                            d = {
                                cate: '',
                                level: ''
                            };
                            switch (form_type) {
                                case 'company':
                                    obj = this.form_company.eng_cate;                                   
                                    break;
                                case 'sup':
                                    obj = this.form_sup.sup_eng_cate;                                   
                                    break;                        
                            }
                            break;
                        case 'goods':
                            d = {
                                permit: '',
                                content: ''
                            };
                            switch (form_type) {
                                case 'company':
                                    obj = this.form_company.goods_cate;                                    
                                    break;
                                case 'sup':
                                    obj = this.form_sup.sup_goods_cate;                                   
                                    break;                        
                            }
                            break;
                        case 'server':
                            d = {
                                major: '',
                                level: ''
                            };
                            switch (form_type) {
                                case 'company':
                                    obj = this.form_company.server_cate;                                    
                                    break;
                                case 'sup':
                                    obj = this.form_sup.sup_server_cate;                                    
                                    break;                        
                            }
                            break;                                            
                    }
                    if (obj.length == 5) {
                        this.$message.error('最多添加五项');
                    } else {
                        obj.push(d);
                    }                                        
                },
                delCate(type, index, form_type) {
                    let obj;
                    switch (type) {
                        case 'eng':
                            switch (form_type) {
                                case 'company':
                                    obj = this.form_company.eng_cate;                                    
                                    break;
                                case 'sup':
                                    obj = this.form_sup.sup_eng_cate;                                    
                                    break;
                            }                            
                            break;
                        case 'goods':
                            switch (form_type) {
                                case 'company':
                                    obj = this.form_company.goods_cate;                                    
                                    break;
                                case 'sup':
                                    obj = this.form_sup.sup_goods_cate;                                    
                                    break;
                            }
                            break;
                        case 'server':
                            switch (form_type) {
                                case 'company':
                                    obj = this.form_company.server_cate;                                    
                                    break;
                                case 'sup':
                                    obj = this.form_sup.sup_server_cate;                                    
                                    break;
                            }
                            break;                   
                    }
                    obj.splice(index,1);                    
                },
                cate_valid(form_type) {
                    let result = true;
                    let a,b,c;
                    switch (form_type) {
                        case 'company':
                            a = this.form_company.eng_cate.findIndex(function(e) {
                                return e.cate == '' || e.level == '';
                            });
                            b = this.form_company.goods_cate.findIndex(function(e) {
                                return e.permit == '' || e.content == '';
                            });
                            c = this.form_company.server_cate.findIndex(function(e) {
                                return e.major == '' || e.level == '';
                            });
                            break;
                    
                        case 'sup':
                            a = this.form_sup.sup_eng_cate.findIndex(function(e) {
                                return e.cate == '' || e.level == '';
                            });
                            b = this.form_sup.sup_goods_cate.findIndex(function(e) {
                                return e.permit == '' || e.content == '';
                            });
                            c = this.form_sup.sup_server_cate.findIndex(function(e) {
                                return e.major == '' || e.level == '';
                            });
                            break;
                    }
                    
                    if (a == -1 || b == -1 || c == -1) {
                        return true;
                    } else {
                        this.$message.error('供应类别不能为空');
                        return false;
                    }
                },
                submitUpload() {
                    this.$refs.upload.submit();
                },
                handleRemove(file, fileList) {
                    console.log(file, fileList);
                },
                handlePreview(file) {
                    console.log(file);
                }
            },
            created: function() {
                if (data.personInfo) {
                    this.form_person = data.personInfo;
                    this.idPhotoUrl = data.personInfo.id_photo_path;
                    this.personFileUrl = 'assets/home/images/pdf-icon.png';
                }
                if (data.companyInfo) {
                    this.form_company = data.companyInfo;
                    this.imageUrl = data.companyInfo.company_logo_path;
                    this.fileUrl = 'assets/home/images/pdf-icon.png';
                }
                if (data.supInfo) {
                    this.form_sup = data.supInfo;
                    this.supIdPhotoUrl = data.supInfo.id_photo_path;
                    this.supFileUrl = 'assets/home/images/pdf-icon.png';
                }
            }

        })
    })
</script>