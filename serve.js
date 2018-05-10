const path  = require('path');
const express = require("express");
const app = express();
var router = express.Router();
const bodyParser = require("body-parser");
const database = require('./server/database/database');
const port = process.env.PORT || 3000;
const auth = require("./server/middle-ware/auth");
const passport = require('passport');
const cookieParser = require('cookie-parser');
const session = require('express-session');

app.all('*', function(req, res, next) {
    res.header('Access-Control-Allow-Origin', '*');
    res.header('Access-Control-Allow-Methods', 'PUT, GET, POST, DELETE, OPTIONS');
    res.header('Access-Control-Allow-Headers', 'Content-Type, x-access-token');
    next();
});

// CHUYỂN DATA THÀNH DẠNG JSON
app.use(bodyParser.urlencoded({ extended:true }));
app.use(bodyParser.json());
require('./server/config/passport')(passport);
app.use(cookieParser());
app.use(session({secret: 'meomeomeo',
				 saveUninitialized: true,
				 resave: true}));

app.use(passport.initialize());
app.use(passport.session());

// REQUIRE ROUTER
const nhanvienRouter = require(path.join(__dirname, "/server/router/nhanvien.router"));
const nguoidungRouter = require(path.join(__dirname, "/server/router/nguoidung.router"));
const thuongluongRouter = require(path.join(__dirname, "/server/router/thuongluong.router"));
const authRouter = require(path.join(__dirname, "/server/router/auth.router"));
const chucvuRouter = require(path.join(__dirname, '/server/router/chucvu.router'));
const ngoainguRouter = require(path.join(__dirname, '/server/router/ngoaingu.router'));
const tinhthanhRouter = require(path.join(__dirname, '/server/router/tinhthanh.router'));
const hedaotaoRouter = require(path.join(__dirname, '/server/router/hedaotao.router'));
const dantocRouter = require(path.join(__dirname, '/server/router/dantoc.router'));
const phatluongRouter = require(path.join(__dirname, '/server/router/phatluong.router'));
const tamungRouter = require(path.join(__dirname, '/server/router/tamung.router'));
const chamcongRouter = require(path.join(__dirname, '/server/router/chamcong.router'));
const caidatluongRouter = require(path.join(__dirname, '/server/router/caidatluong.router'));

// ROUTER
app.use('/api', nhanvienRouter);
app.use('/api', nguoidungRouter);
app.use('/api/caidatluong', caidatluongRouter);
app.use('/api', thuongluongRouter)
app.use('/api/phatluong', phatluongRouter)
app.use('/api/chucvu', chucvuRouter);
app.use('/api/tamung', tamungRouter);
app.use('/api/ngoaingu', ngoainguRouter);
app.use('/api/tinhthanh', tinhthanhRouter);
app.use('/api/hedaotao', hedaotaoRouter);
app.use('/api/dantoc', dantocRouter);
app.use('/api/chamcong', chamcongRouter);
app.use('/auth', authRouter);

app.listen(port, function() {
    console.log("server đang hoạt động trên port: ", port);
})