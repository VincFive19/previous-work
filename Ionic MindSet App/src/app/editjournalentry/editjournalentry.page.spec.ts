import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { EditjournalentryPage } from './editjournalentry.page';

describe('EditjournalentryPage', () => {
  let component: EditjournalentryPage;
  let fixture: ComponentFixture<EditjournalentryPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ EditjournalentryPage ],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(EditjournalentryPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
