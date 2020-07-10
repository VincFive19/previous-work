import { Injectable } from '@angular/core';
import { EmailComposer } from '@ionic-native/email-composer/ngx';

@Injectable({
  providedIn: 'root'
})
export class EmailService {

  constructor(private emailComposer: EmailComposer) { }

  //Send email function 
  sendEmail(journal, edit, name, psychEmail, userEmail) {

    //checks if the function is run from the edit page
    if (edit == true) {

      //creates email
      let email = {
        to: psychEmail,
        cc: userEmail,
        bcc: [],
        attachments: [
          journal.image
        ],
        subject: journal.time + " " + name + " Edit",
        body: 'This is ' + name + ' journal entry on the ' + journal.time + '<br><b>Context:</b><br>' + journal.context + '<br><b>Triggers:</b><br>' + journal.triggers + '<br><b>Coping Strategies:</b><br>' + journal.cope + '<br><b>Intensity:</b><br>' + journal.intensity + "<br>Sent via the MindSet App. <br>Note this is an edit of the original journal entry.",
        isHtml: true
      }
      // Sends email using devices email application
      this.emailComposer.open(email);
    } else {
      //creates email
      let email = {
        to: psychEmail,
        cc: userEmail,
        bcc: [],
        attachments: [
          journal.image
        ],
        subject: journal.time + " " + name,
        body: 'This is ' + name + 'journal entry on the' + journal.time + '<br><b>Context:</b><br>' + journal.context + '<br><b>Triggers:</b><br>' + journal.triggers + '<br><b>Coping Strategies:</b><br>' + journal.cope + '<br><b>Intensity:</b><br>' + journal.intensity + "<br>Sent via the MindSet App",
        isHtml: true
      }

      // Send email
      this.emailComposer.open(email);
    }




  }

}
