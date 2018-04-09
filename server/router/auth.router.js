var router = require('express').Router();
var authController = require('../controller/auth.controller');
var jwt = require('./../utils/jwt');
var nguoidungModel = require('../model/nguoidung.model');
const passport = require('passport');

router.post('/login', login);
router.get('/me', me);
router.get('/google', passport.authenticate('google', {scope: ['profile', 'email']}));
router.get('/google/callback', 
	  passport.authenticate('google', { failureRedirect: '/' }), function(req, res){
        res.redirect('http://localhost/quanlynhansu/index.php?module=admin&controller=dangnhap&action=index&token='+req.user.token);
      });

router.get('/facebook', passport.authenticate('facebook', {scope: ['profile','email']}));
router.get('/facebook/callback', 
    passport.authenticate('facebook', { successRedirect: '/profile',
                                    failureRedirect: '/' }));
module.exports = router;

function login(req, res, next) {
    var email = req.body.email;
    var password = req.body.password;

    authController.login(email, password)
        .then(function (token) {
            res.send(token)
        })
        .catch(function (err) {
            res.send(err);
        })
}

function me(req, res, next){
    let token = req.query.token;
    jwt.verify(token, function (err, decodedData) {
        if (err) {
            res.status(401);
            res.json({
                message: 'Invalid Token'
            });
        } else {
            var email = decodedData.email;
            return nguoidungModel.findOne({email: email})
                .then(function (foundNguoidung) {
                    if (foundNguoidung) {
                        res.send(foundNguoidung);
                    } else {
                        return Promise.reject({
                            message: 'Not Found'
                        });
                    }
                })
                .catch(function (err) {
                    res.send(err);
                })
        }
    })
}
