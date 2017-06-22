import { Component } from '@angular/core';
import { Events } from 'ionic-angular';
import { Platform, ActionSheetController } from 'ionic-angular';
import { NavController } from 'ionic-angular';
import { AlertController } from 'ionic-angular';
//import { TagsPage } from '../tags/tags';
import { ProductionPage } from '../production/production';
import { SearchPage } from '../search/search';
import { LoginPage } from '../login/login';
import { AuthService } from '../../providers/auth-service';
import { Device } from 'ionic-native';

/**
 *
 *
 * @export
 * @class HomePage
 */
@Component({ selector: 'page-home', templateUrl: 'home.html' })
export class HomePage {
    public isAndroid: boolean = false;
    public userinfo: any;
    public sessionid: string;
    public username: string;
    public isIos: boolean = false;
    public info: string;
    public platforminfo: any;

    constructor(
        public navCtrl: NavController,
        public platform: Platform,
        public actionsheetCtrl: ActionSheetController,
        public alertCtrl: AlertController,
        public events: Events,
        private auth: AuthService,
        public device: Device

    ) {
        let info = this.auth.getUserInfo();
        console.log("info.fullname: " + info.fullname);
        this.userinfo = {};
        this.userinfo.sessionid = info.sessionid;
        this.userinfo.username = info.username;
        this.userinfo.fullname = info.fullname;

        this.platforminfo = {};
        this.platforminfo.useragent = platform.userAgent();
        this.platforminfo.screensize = "width: " + platform.width() + " | height: " + platform.height();
        this.deviceInfo();
        this.platforminfo.deviceuuid = this.device.uuid;
    }

    ionViewDidLoad() {
        console.log('Hello Home Page');
    }

    public logout() {
        this.auth.logout(this.userinfo.sessionid).subscribe(succ => {
            this.navCtrl.setRoot(LoginPage)
        });
    }
    openProductionPage() {
        this.navCtrl.push(ProductionPage);
    }

    openSearchPage() {
        this.navCtrl.push(SearchPage);
    }

    public deviceInfo() {
        this.platform.ready().then(() => {
            console.log('Device UUID is: ' + this.device.uuid);
        });

    }
}