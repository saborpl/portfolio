import { Component, ViewChild } from "@angular/core";
import { NavController, PopoverController } from 'ionic-angular';
import { AuthService } from '../../providers/auth-service';
import { PopoverScenePage } from '../../pages/popover-scene/popover-scene';
import { PopoverDayPage } from '../../pages/popover-day/popover-day';
import { PopoverRollPage } from '../../pages/popover-roll/popover-roll';
import { PopoverTagPage } from '../../pages/popover-tag/popover-tag';
import { PopoverSearchPage } from '../../pages/popover-search/popover-search';
import { PopoverMetaPage } from '../../pages/popover-meta/popover-meta';
import { Storage } from '@ionic/storage';
import { Platform } from 'ionic-angular';
import { PropertyService } from '../../providers/property-service';


/*
  Generated class for the Player page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
    selector: 'page-player',
    templateUrl: 'player.html'
})
export class PlayerPage {

    greeting: string;
    testSlides: string[] = [];
    @ViewChild('mySlider') mySlider: any;
    _options: any;
    ids: number;
    urlg: string[] = [];
    isLandscape: boolean;
    scenes: any;
    public sessionid: string;

    constructor(
        public navCtrl: NavController,
        public popoverCtrl: PopoverController,
        private storage: Storage,
        private auth: AuthService,
        private platform: Platform,
        private property: PropertyService,

    ) {
        this.isSessionUser();
        this._options = {
            slidesPerView: 3,
            pager: true,
            nextButton: ".swiper-button-next",
            prevButton: ".swiper-button-prev",
            onInit: () => {
            }
        }
        setTimeout(() => {
            for (var i = 1; i < 5; i++) {
                this.testSlides.push("Slide - " + i);
                this.ids = i++;
                console.log(this.ids);
            }
        }, 100);

        this.loadRemoteProduction();
        this.isLandscape = platform.isLandscape() ? true : false;
    }

    loadRemoteProduction() {
        this.storage.get('sessionid').then((val) => {
            this.sessionid = val;
            //this.property.getProductionList(this.sessionid);
            this.property.getRemoteProduction(this.sessionid, "king")
                .subscribe(
                data => {
                    this.scenes = JSON.parse(data.data);
                    console.log(this.scenes);
                },
                err => {
                    console.log(err);
                },
                () => console.info('Loading remote production complete.')
                );
        });
    }

    isSessionUser() {
        /* check if page have sessionid  */
        try {
            this.storage.get('sessionid').then((val) => {
                this.sessionid = val;
                if (!this.sessionid) {
                    console.error("ProductionPage: No Session!");
                    //this.navCtrl.setRoot(LoginPage);
                } else {
                    console.info("ProductionPage: " + 'sessionid', this.sessionid);
                }
            });

        } catch (error) {
            console.error("ProductionPage: " + 'isSessionid', this.auth.isSession());
        }
    }

    presentPopoverDay(myEvent) {
        let popover = this.popoverCtrl.create(PopoverDayPage);
        popover.present({
            ev: myEvent
        });
    }
    presentPopoverScene(myEvent) {
        let popover = this.popoverCtrl.create(PopoverScenePage);
        popover.present({
            ev: myEvent
        });
    }
    presentPopoverRoll(myEvent) {
        let popover = this.popoverCtrl.create(PopoverRollPage);
        popover.present({
            ev: myEvent
        });
    }
    presentPopoverTag(myEvent) {
        let popover = this.popoverCtrl.create(PopoverTagPage);
        popover.present({
            ev: myEvent
        });
    }
    presentPopoverSearch(myEvent) {
        let popover = this.popoverCtrl.create(PopoverSearchPage);
        popover.present({
            ev: myEvent
        });
    }
    presentPopoverMeta(myEvent) {
        let popover = this.popoverCtrl.create(PopoverMetaPage);
        popover.present({
            ev: myEvent
        });
    }

    ionViewDidLoad() {
        console.log('Hello PlayerPage Page');
    }
}
