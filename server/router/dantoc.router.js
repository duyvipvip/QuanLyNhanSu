const router = require('express').Router();
const dantocController = require("../controller/dantoc.controller");

router.get('/all', getDanTocs);
router.get('/only', getDanToc);
router.post('/create', createDanToc);
router.post('/delete', deleteDanToc);
router.post('/update', updateDanToc);
module.exports = router;

function getDanTocs(req, res, next){
    dantocController.getDanTocs()
        .then((dantoc) => {
            res.send(dantoc);
        })
        .catch((err) => {

        });
}

function updateDanToc(req, res, next){
    dantocController.updateDanToc(req.body)
        .then((DanToc) => {
            res.send(DanToc);
        })
        .catch((err) => {

        });
}

function getDanToc(req, res, next){
    let iddantoc = req.query.iddantoc;
    dantocController.getDanToc(iddantoc)
        .then((DanToc) => {
            res.send(DanToc);
        })
        .catch((err) => {

        });
}

function createDanToc(req, res, next){
    dantocController.createDanToc(req.body)
        .then((DanToc) => {
            res.send(DanToc);
        })
        .catch((err) => {

        });
}

function deleteDanToc(req, res, next){
    dantocController.deleteDanToc(req.body.iddantoc)
        .then((DanToc) => {
            res.send(DanToc);
        })
        .catch((err) => {

        });
}

