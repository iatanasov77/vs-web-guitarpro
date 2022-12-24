import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FavoritesButtonItemComponent } from './favorites-button-item.component';

describe('FavoritesButtonItemComponent', () => {
  let component: FavoritesButtonItemComponent;
  let fixture: ComponentFixture<FavoritesButtonItemComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ FavoritesButtonItemComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(FavoritesButtonItemComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
