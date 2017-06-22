import { Component, ViewChild } from '@angular/core';
import { NavController } from 'ionic-angular';
import { PlayerPage } from '../player/player';
import { AuthService } from '../../providers/auth-service';
import { PropertyService } from '../../providers/property-service';
import { Storage } from '@ionic/storage';
import { LoginPage } from '../login/login';

/*
  Generated class for the Production page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-production',
  templateUrl: 'production.html',
})
export class ProductionPage {
  public userinfo: any;
  public sessionid: string;
  public username: string;
  public info: string;
  public productionList: any;
  @ViewChild('mySlider') mySlider: any;
  _options: any;
  public movies: Array<any>;

  constructor(
    public navCtrl: NavController,
    private storage: Storage,
    private auth: AuthService,
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

    this.storage.get('sessionid').then((val) => {
      this.sessionid = val;
      //this.property.getProductionList(this.sessionid);
      //this.property.getProductionDetails(this.sessionid, "king");
    });

  }


  searchMovieDB(event) {
    if (event.target.value.length > 2) {
      this.property.searchMovies(event.target.value).subscribe(
        data => {
          this.movies = data.results;
          console.log(data);
        },
        err => {
          console.log(err);
        },
        () => console.log('Movie Search Complete')
      );
    }
  }

  itemTapped(event, movie) {
    console.log(movie);
    //this.navCtrl.push(MovieInfo, {
    //movie: movie
    //});
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

  ionViewDidLoad() {
    console.log('Hello ProductionPage Page');
  }

  //   doInfinite(infiniteScroll) {
  //     console.log('Begin async operation');
  // 
  //     setTimeout(() => {
  //       for (var i = 0; i < 3; i++) {
  //         this.productions.push(this.productions.length);
  //       }
  // 
  //       console.log('Async operation has ended');
  //       infiniteScroll.complete();
  //     }, 500);
  //   }
  // 

  openPlayerPage() {
    this.navCtrl.push(PlayerPage);
  }

  public logout() {
    let uinfo = this.auth.getUserInfo();
    console.log("info.fullname: " + uinfo.sessionid);
    this.auth.logout(uinfo.sessionid).subscribe(succ => {
      this.navCtrl.setRoot(LoginPage)
    });
  }
}
