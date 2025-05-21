const router=require('express').Router();
const cors=require('cors');
const passport = require('passport');

const user_protect=require('../../middleware/UserProtect');
const DashboardController= require('../../controllers/passport_controllers/DasboardController');
router.use(cors());
const AuthTokenStrategy=require('../../middleware/PassportStrategy');
// Register the custom strategy with Passport
passport.use('authtoken', new AuthTokenStrategy());

// router.get('/dashboard',passport.authenticate('authtoken', { session: false }),user_protect.checkUserAccess,DashboardController.dashboard);

router.get('/dashboard',user_protect.checkPassportToken,DashboardController.dashboard);

module.exports=router;