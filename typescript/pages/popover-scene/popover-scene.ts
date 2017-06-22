import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { Storage } from '@ionic/storage';
import { PropertyService } from '../../providers/property-service';
import { AuthService } from '../../providers/auth-service';

/*
  Generated class for the PopoverScene page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-popover-scene',
  templateUrl: 'popover-scene.html'
})
export class PopoverScenePage {
  scenes: string[] = [];
  ids: number;
  public sessionid: string;

  constructor(
    public navCtrl: NavController,
    private storage: Storage,
    private property: PropertyService,
    private auth: AuthService,
  ) {
    setTimeout(() => {
      for (var i = 1000; i < 1030; i++) {
        this.scenes.push("" + i);
      }
    }, 100);
    this.isSessionUser();
    //this.loadRemoteProduction();
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

  loadRemoteProduction() {
    this.storage.get('sessionid').then((val) => {
      this.sessionid = val;
      //this.property.getProductionList(this.sessionid);
      this.property.getRemoteProduction(this.sessionid, "king")
        .subscribe(
        data => {
          this.scenes = data.data;
          console.log(this.scenes);
        },
        err => {
          console.log(err);
        },
        () => console.info('Loading remote production complete.')
        );
    });
  }

  ionViewDidLoad() {
    console.log('Hello PopoverScenePage Page');
  }

}
