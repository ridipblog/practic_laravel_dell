const router=require('express').Router();
const cors=require('cors');

const user_protect=require('../../middleware/UserProtect');
const DashboardController= require('../../controllers/jwt_controllers/DashboardControler');
router.use(cors());

router.get('/dashboard',user_protect.checkJWTAuthToken,DashboardController.dashboard);
module.exports=router;