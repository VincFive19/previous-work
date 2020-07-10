import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ModalNamePage } from './modal-name.page';

describe('ModalNamePage', () => {
  let component: ModalNamePage;
  let fixture: ComponentFixture<ModalNamePage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ModalNamePage ],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ModalNamePage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
