const nguoidungModel = require('../model/nguoidung.model');
var mail = require('../utils/mail');
var auth = require('../controller/auth.controller')
var crypto = require('crypto');
var jwt = require('../utils/jwt');
var secret = 'meomeomeo';

module.exports = {
    laytatcanguoidung: laytatcanguoidung,
    taomoinguoidung: taomoinguoidung,
    chinhsuanguoidung: chinhsuanguoidung,
    xoanguoidung: xoanguoidung,
    timkiemnguoidung: timkiemnguoidung
}

// LẤY TẤT CẢ CÁC NHÂN VIÊN
function laytatcanguoidung(){
    return nguoidungModel.find({})
        .then((nguoidung) => {
            return Promise.resolve(nguoidung);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

// TẠO MỚI NHÂN VIÊN
// function taomoinguoidung(bodynguoidung){
//     let newnguoidung = new nguoidungModel(bodynguoidung)
//     return newnguoidung.save()
//         .then((nguoidung) => {
//             return Promise.resolve(nguoidung);
//         })
//         .catch((err) => {
//             return Promise.reject(err);
//         })
// }

// tạo người dùng
function taomoinguoidung(newNguoidung) {
    let pass =newNguoidung.password;
    return nguoidungModel.find({ email: newNguoidung.email })
        .then(function (foundNguoidung) {
            if (foundNguoidung.length > 0) {
                return Promise.reject({
                    statusCode: 400,
                    message: 'Email đã tồn tại'
                });
            } else {
                var hash = crypto.createHmac('sha256', secret)
                    .update(newNguoidung.password)
                    .digest('hex');

                newNguoidung.password = hash;
                var nguoidung = new nguoidungModel(newNguoidung);
                
                return nguoidung.save()
                    .then(function (nguoidung) {
                        jwt.sign({
                            email: nguoidung.email
                        }, function (err, token) {
                            let url = "http://localhost:3000/api/xacnhannguoidung?token="+token;
                            return mail.sendMail('', nguoidung.email, 'Xin mời bạn click vào dường link để hoàn tất quá trình đăng kí',url)
                                .then((res)=> {
                                    return Promise.resolve(nguoidung);
                                }).catch(function (err) {
                                    return Promise.reject(err);
                                })
                        })
                    })
                    .catch(function (err) {
                        return Promise.reject(err);
                    })
            }
        })
        .catch(function (err) {
            return Promise.reject(err);
        })
}
// CHỨNG THỰC TOKEN
function xacnhannguoidung(token){
    
}
// CHỈNH SỬA NHÂN VIÊN
function chinhsuanguoidung(bodynguoidung){
    let objnguoidung = {
        "tendangnhap": bodynguoidung.tendangnhap,
        "email": bodynguoidung.email,
        "matkhau": bodynguoidung.matkhau,
        "quyenthem": bodynguoidung.quyenthem,
        "quyenxoa": bodynguoidung.quyenxoa,
        "quyensua": bodynguoidung.quyensua,
    }
    return nguoidungModel.findOneAndUpdate({_id: bodynguoidung._id}, objnguoidung)
        .then((nguoidung) => {
            return Promise.resolve(nguoidung);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

// XOÁ MỘT NHÂN VIÊN
function xoanguoidung(idnguoidung){
    return nguoidungModel.findByIdAndRemove({_id: idnguoidung})
        .then((nguoidung) => {
            return Promise.resolve(nguoidung);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

// TÌM KIẾM MỘT NHÂN VIÊN
function timkiemnguoidung(idnguoidung){
    return nguoidungModel.findById({_id: idnguoidung})
    .then((nguoidung) => {
        return Promise.resolve(nguoidung);
    })
    .catch((err) => {
        return Promise.reject(err);
    })
}