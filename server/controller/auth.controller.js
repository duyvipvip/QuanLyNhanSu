var nguoidungModel = require('../model/nguoidung.model');
var crypto = require('crypto');
var jwt = require('../utils/jwt');
var secret = 'meomeomeo';

module.exports = {
    login: login,
    checkAuth: checkAuth
}

function login(email, password) {
    var hash = crypto.createHmac('sha256', secret)
        .update(password)
        .digest('hex');
    return nguoidungModel.findOne({
        email: email,
        password: hash
    })
        .then(function (nguoidung) {
            if (nguoidung) {
                let kinhhoat = nguoidung['kichhoat'];
                if(kinhhoat.toString() == 'false'){
                    return Promise.reject({
                        statusCode: 400,
                        token: null,
                        message: 'Tài khoản của bạn trưa được kích hoạt'
                    });
                }else{
                    return new Promise(function (resolve, reject) {
                        jwt.sign({
                            email: nguoidung.email
                        }, function (err, token) {
                            if (err) {
                                reject({
                                    statusCode: 400,
                                    message: err.message,
                                    token: null,
                                });
                            } else {
                                
                                resolve({
                                    token: token,
                                    nguoidung: nguoidung
                                });
                            }
                        })
                    });
                }
            } else {
                return Promise.reject({
                    statusCode: 400,
                    token: null,
                    message: 'Email or password is incorrect'
                });
            }
        })
        .catch(function (err) {
            return Promise.reject(err);
        })
}
function duy(){
    
}
function checkAuth(nguoidung) {
    // console.log(nguoidung);
    return nguoidungModel.find(nguoidung)
        .then(function (foundNguoidung) {
            if (foundNguoidung) {
                return Promise.resolve(foundNguoidung);
            } else {
                return Promise.reject({
                    message: 'Not Found'
                });
            }
        })
        .catch(function (err) {
            return Promise.reject(err);
        })
}