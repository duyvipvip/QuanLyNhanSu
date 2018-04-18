const router = require('express').Router();
const caidatluongModel = require("../controller/caidatluong.controller");

router.get('/all', getCaiDatLuong);
router.post('/update', updateCaiDatLuong);
module.exports = router;

function getCaiDatLuong(req, res, next){
    caidatluongModel.getCaiDatLuong(req.body)
        .then((caidatluong) => {
            res.send(caidatluong);
        })
        .catch(() => {

        })
}

function updateCaiDatLuong(req, res, next){
    caidatluongModel.updateCaidatLuong(req.body)
        .then((caidatluong) => {
            res.send(caidatluong);
        })
        .catch(() => {

        })
}