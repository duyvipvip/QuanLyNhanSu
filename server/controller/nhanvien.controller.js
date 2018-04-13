const nhanvienModel = require('../model/nhanvien.model');

module.exports = {
    laytatcanhanvien: laytatcanhanvien,
    taomoinhanvien: taomoinhanvien,
    chinhsuanhanvien: chinhsuanhanvien,
    xoanhanvien: xoanhanvien,
    timkiemnhanvien: timkiemnhanvien
}

// LẤY TẤT CẢ CÁC NHÂN VIÊN
function laytatcanhanvien(){
    return nhanvienModel.find({})
        .populate({
            path: 'thuongluongs',
            select: 'thangthuong ngaythuong sotienthuong lydothuong'
        })
        .populate({
            path: 'phatluongs',
            select: 'thangphat ngayphat sotienphat lydophat'
        })
        .populate({
            path: 'tamungs',
            select: 'thangtamung ngaytamung sotientamung lydotamung'
        })
        .populate({
            path: 'chamcongs',
            select: 'time'
        })
        .then((nhanvien) => {
            return Promise.resolve(nhanvien);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

// TẠO MỚI NHÂN VIÊN
function taomoinhanvien(bodynhanvien){
    let newNhanvien = new nhanvienModel(bodynhanvien);
    return newNhanvien.save()
        .then((nhanvien) => {
            return Promise.resolve(nhanvien);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

// CHỈNH SỬA NHÂN VIÊN
function chinhsuanhanvien(bodynhanvien){
    let objnhanvien = {
        "hoten": bodynhanvien.hoten,
        "gioitinh": bodynhanvien.gioitinh,
        "email": bodynhanvien.email,
        "ngaysinh": bodynhanvien.ngaysinh,
        "cmnd": bodynhanvien.cmnd,
        "hinhanh": bodynhanvien.hinhanh,
        "diachi": bodynhanvien.diachi,
        "sodienthoai": bodynhanvien.sodienthoai,
        "giadinh": bodynhanvien.giadinh,
        "nghiviec": bodynhanvien.nghiviec,
        "chucvu": bodynhanvien.chucvu,
        "ngoaingu": bodynhanvien.ngoaingu,
        "tinhthanh": bodynhanvien.tinhthanh,
        "hedaotao": bodynhanvien.hedaotao,
        "dantoc": bodynhanvien.dantoc
    }
    
    return nhanvienModel.findOneAndUpdate({_id: bodynhanvien._id}, objnhanvien)
        .then((nhanvien) => {
            return Promise.resolve(nhanvien);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

// XOÁ MỘT NHÂN VIÊN
function xoanhanvien(idnhanvien){
    return nhanvienModel.findByIdAndRemove({_id: idnhanvien})
        .then((nhanvien) => {
            return Promise.resolve(nhanvien);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

// TÌM KIẾM MỘT NHÂN VIÊN
function timkiemnhanvien(idnhanvien){
    return nhanvienModel.findById({_id: idnhanvien})
    .then((nhanvien) => {
        return Promise.resolve(nhanvien);
    })
    .catch((err) => {
        return Promise.reject(err);
    })
}