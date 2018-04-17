const express = require("express");
const app = express();
var router = express.Router();
const bodyParser = require("body-parser");
const database = require('./database/database');
const port = process.env.port || 3000;
const auth = require("./middle-ware/auth");
const passport = require('passport');
const cookieParser = require('cookie-parser');
const session = require('express-session');



// CHUYỂN DATA THÀNH DẠNG JSON
app.use(bodyParser.urlencoded({ extended:false }));
app.use(bodyParser.json());

require('./config/passport')(passport);
app.use(cookieParser());
// app.use(bodyParser.urlencoded({extended: false}));
app.use(session({secret: 'meomeomeo',
				 saveUninitialized: true,
				 resave: true}));

app.use(passport.initialize());
app.use(passport.session());

// REQUIRE ROUTER
const nhanvienRouter = require("./router/nhanvien.router");
const nguoidungRouter = require("./router/nguoidung.router");
const thuongluongRouter = require("./router/thuongluong.router");
const authRouter = require("./router/auth.router");
const chucvuRouter = require('./router/chucvu.router');
const ngoainguRouter = require('./router/ngoaingu.router');
const tinhthanhRouter = require('./router/tinhthanh.router');
const hedaotaoRouter = require('./router/hedaotao.router');
const dantocRouter = require('./router/dantoc.router');
const phatluongRouter = require('./router/phatluong.router');
const tamungRouter = require('./router/tamung.router');
const chamcongRouter = require('./router/chamcong.router');
const caidatluongRouter = require('./router/caidatluong.router');

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